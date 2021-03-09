# BMS API
This is my small project called BMS API Using Lumen with JWT-AUTH and Email Verification

# What is BMS? 
Billing Management System, help you to tracking your tax or subscriber billing or whatever it is.

# How to use it:
1. make sure u have environment for laravel (like php7.3^, database, composer, etc) and then clone from this github.
2. do "composer install" on project folder.
3. set up your environment file (.env), if you have SMTP Server u can attach it on .env file, make sure to fill the variable same with laravel, and dont forget to set up your database too.
4. if you dont want to use SMTP and want to bypass Email Verification, follow the "Bypass" step-1.
5. migrating, and u can also use dummy data while migrating (php artisan migrate:refresh --seed).
6. if you use bypass method, in this step u need to follow the "Bypass" step-2.
7. Enjoy.

# IMPORTANT NOTE:
IF YOU ARE TOO LAZY FOR DO BYPASS STEP, BUT STILL HATE SMTP/Email Verification, JUST IMPORT DATABASE FROM THIS ROOT PROJECT FOLDER CALLED "bms_lumen.sql" TO YOUR DATABASE AND SET UP THE ENV, THEN U CAN LOGIN USING CREDENTIALS:

- username: admin
- password: password

THX U.

# Bypass Email Verification step
1. comment "use Authenticatable, Authorizable, HasFactory, Notifiable, MustVerifyEmail;" and uncomment "use Authenticatable, Authorizable, HasFactory;" on app/Models/User, then u need to comment the section "protected static function boot()" and that content on app/Models/User, after do that you will feel free for migrating your database without any problem like email verification failure.
2. after migrating, dont forget to uncomment the "use Authenticatable, Authorizable, HasFactory, Notifiable, MustVerifyEmail;" then comment "use Authenticatable, Authorizable, HasFactory;" and uncomment the section "protected static function boot()" and that content (step 1 "Bypass" with the opposite work)


This project is still in delevopment, dont expect to much from this smool project, hehe.
