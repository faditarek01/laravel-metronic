Needed versions :
Laravel Framework 12.16.0 
Composer version 2.8.9 
PHP version 8.2.12

to restore the sql backup : 
Step-by-Step: Safe Import
✅ 1. Make Sure MySQL Server Is Running
If you're using XAMPP: Start MySQL from the XAMPP Control Panel

If you're using MySQL80 service: Make sure it's running from services.msc

✅ 2. Open Command Prompt (as Administrator)
Press Win + S, search for Command Prompt, right-click → Run as administrator

✅ 3. Navigate to MySQL bin Folder
Choose the appropriate one:

For XAMPP:

cd C:\xampp\mysql\bin
For MySQL 8.0:

cd "C:\Program Files\MySQL\MySQL Server 8.0\bin"
✅ 4. Create a New Database
This prevents overwriting anything.

mysql -u root -p
At the MySQL prompt:


CREATE DATABASE dump_restore_db;
EXIT;
✅ 5. Import the Dump File
Back in the regular Command Prompt:

mysql -u root -p dump_restore_db < "C:\Users\Omen\Documents\dumps\Dump20250531.sql"
✅ It will import all structure and data into the new database dump_restore_db.

✅ 6. Verify the Import
Open phpMyAdmin or log back into MySQL CLI and run:

USE dump_restore_db;
SHOW TABLES;
You should see tables like blogs, etc.
