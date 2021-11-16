

## Форма зворотного звязу на Laravel
## FeedBackForm

У даній формі реалізовані наступні моделі 
- User 
- Role
- Status
- File
- FeedBack

Користуваі мають усьго дві ролі  user  та  manager 
 - manager  створений заздалегідь  
    - email:   manager@gmail.com
    - пароль:  password
- user як клієт повинен зареєструватись 

вхід у систему через авторизацію  після авторизації  user  потрапляє на  сторінку з формою  та запвнює і відправляє форму
при обробці  форми  manager  отримує  email з усіма деталями форми

manager після авторизації потрапляє на сторінку де  відображені усі FeedBack  від  users  та має можливість змінити їх 
статус  кожного FeedBack з нової на оброблена.


Щоб розгорнути проект  виконайте наступні пункти 
1 Клонуйте даний репозиторій 
    - gh repo clone aleksvin8888/FeedBackForm.Laravel
2 встановити додаткові пакети 
    - composer install
    - npm install
3 створити в кріні проекта фаїл ".env"
4 скопіювати дані з "env.example" 
    - підставити свої налаштування  бази даних 
        DB_DATABASE=
        DB_USERNAME=
        DB_PASSWORD=
5 підключити та налаштувати почтовий сервіс 
    для прикладу я використовува  
    https://mailtrap.io/
6 Згенерувати  APP_KEY  
    php artisan key:generate
7 Запустити міграції та сиди 
    php artisan migrate --seed
8 Запустити  вмконання черг 
    php artisan queue:work
    
    
  Буду радий зворотньму звязку та рекомендаціям з покращення функціоналу  https://t.me/Aleksvin8888  
