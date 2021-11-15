<?php

namespace App\Services;

use App\Models\File;
use App\Services\Base\MySqlService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Storage;
use DB;
use Exception;
use App\Models\Interfaces\HasFileRelationInterface;

final class FileService extends MySqlService
{
    /**
     * @param Model $model
     * @param UploadedFile $uploadedFile
     * @return File|Model|void
     * @throws
     */
    public function create(Model $model, UploadedFile $uploadedFile)
    {
        DB::beginTransaction();
        try {
            $file = File::make();
            $file->mime_type = $uploadedFile->getMimeType();
            $file->path = $uploadedFile->getFilename();
            $file->name = $uploadedFile->getClientOriginalName();

            $file->fileable()->associate($model);

            $file->save();

            Storage::disk('public')->put(
                $file->getPath(),
                file_get_contents($uploadedFile->getRealPath())
            );

            DB::commit();

            return  $model;
        } catch (Exception $exception) {
            $this->handleException($exception);
        }
    }

    /**
     * @param File $file
     * @return File|void
     * @throws
     */
    public function delete(File $file)
    {
        DB::beginTransaction();
        try {
            Storage::disk('public')->deleteDirectory($file->id);

            $file->delete();

            DB::commit();

            return $file;
        } catch (Exception $exception) {
            $this->handleException($exception);
        }
    }

    /**
     * @param HasFileRelationInterface $model
     * @param array $data
     * @return HasFileRelationInterface|Model
     */
    public function saveFileAbleModel(HasFileRelationInterface $model, array $data)
    {
        /** @var File $file */
        $file = $model
            ->file()
            ->first();

        if ($file) {

            $this->delete($file);

        }

        if ($model instanceof Model) {

            if (isset($data['file'])) {
                $this->create($model, $data['file']);

            }

        }
        return $model;
    }

}
