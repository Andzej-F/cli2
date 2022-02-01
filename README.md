# cli2

<pre>

--- Using Application ---

-- open "install.php" file (when runnig the application for the first time), that will create schema `registration` and `users` table and will populate some example data to the table
-- type "php index.php" command every time, you wish to start the application

 -- Select "Register for appointment" option to create new "appointment"
  -- After that you will be redirected to the "User Settings Page"
  -- Choose preferred option

- Login
  -- After being registered, use your email as a login to access "User Settings Page"
  -- For "medical personnel" login enter "med@med.com"
     -- After that "Registered Appointment Dates" menu will appear
     -- Type preferred date to view the details

--- Structure ---

 Main menu:
  --Register (same as add appointment) 
    --User Settings Page
        --Edit appointment info
        --Delete appointment date
        --Go to main menu
  --Login
    --User Login
        --User settings page
            --Edit appointment info
            --Delete appointment date
            --Go to main menu
    --Medical Personnel Login (login with email med@med.com)
        -- Show appointments
  --Exit the application
  
  
  --- Functionality ---
  
--Add appointment
--Edit appointment
--Delete appointment
--Print list of appointment for specific date(for medical personnel)
--User input validations (name, email, phone number, ID number, date, time)

Application Screenshots
</pre>
