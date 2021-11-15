<?php


namespace App\Services;


use App\Models\FeedBack;
use App\Models\Interfaces\HasFileRelationInterface;
use App\Models\Status;
use App\Services\Base\MySqlService;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Model;

final class FeedBackService extends MySqlService
{
    /** @var FileService */
    private $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * @param array $data
     * @return FeedBack|Model|void
     * @throws Exception
     */
    public function create(array $data)
    {
        DB::beginTransaction();
        try {

            $status = Status::where('slug', '=', 'new')
                ->where('related_model', '=', FeedBack::class)
                ->first();


            $feedBack = FeedBack::make($data);

            $feedBack = $this->synchronize($feedBack, $data);
            $feedBack->status_id = $status->id;

            $feedBack->save();

            if(isset($data['file'])) {
                $feedBack = $this->fileService->create($feedBack, $data['file']);
            }

            DB::commit();

            return $feedBack;
        } catch(Exception $exception) {
            $this->handleException($exception);
        }
    }

    /**
     * @param FeedBack $feedBack
     * @param array $data
     * @return FeedBack|void
     * @throws Exception
     */

    public function update(FeedBack $feedBack, array $data)
    {
        DB::beginTransaction();
        try {

            $feedBack = $this->synchronizeFile($feedBack, $data);
            $feedBack = $this->synchronize($feedBack, $data);

            $feedBack->update($data);

            DB::commit();

            return $feedBack;
        } catch(Exception $exception) {
            $this->handleException($exception);
        }
    }

    /**
     * @param FeedBack $feedBack
     * @return FeedBack|void
     * @throws Exception
     */
    public function delete(FeedBack $feedBack)
    {
        DB::beginTransaction();
        try {

            if($feedBack->file) {
                $this->fileService->delete($feedBack->file);
            }
            $feedBack->delete();

            DB::commit();

            return $feedBack;
        } catch(Exception $exception) {
            $this->handleException($exception);
        }
    }

    /**
     * @param FeedBack $feedBack
     * @param array $data
     * @return HasFileRelationInterface|Model|FeedBack
     */
    public function synchronizeFile(FeedBack $feedBack, array $data)
    {
        if(isset($data['file'])) {
            $feedBack = $this->fileService->saveFileAbleModel($feedBack, $data);
        }
        return $feedBack;
    }

    /**
     * @param FeedBack $feedBack
     * @param array $data
     * @return Model|FeedBack
     */
    public function synchronize(FeedBack $feedBack, array $data)
    {
        if(isset($data['user_id'])) {
            $feedBack->user()->associate($data['user_id']);
        }

        if(isset($data['status_id'])) {
            $feedBack->status()->associate($data['status_id']);
        }

        return $feedBack;
    }

}
