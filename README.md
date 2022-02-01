# cli2

<pre>

--- Prerequisites  ---

To run  the application, you need PHP and MySQL database installed on your machine. 


--- Installation ---

-- Download project's zip file from the repository and extract in your selected folder. 
-- In command line type "path_to_the_project_folder"+"php install.php" command(e.g. "c:\xampp\htdocs\PHP\cli2>php install.php"). After that `cli2` schema will be created with `patients`and `personnel`tables with some example data.
-- Then change direcory to the public folder (cd public) (e.g. "c:\xampp\htdocs\PHP\cli2\public")


--- Structure ---

 Main menu:
  1. Register for appointment ("reg")
    --User Settings Page
        --Edit appointment info
        --Delete appointment date
        --Go to main menu
  2. Patient Login ("login")
        --User settings page
          --Edit appointment info
          --Delete appointment date
          --Go to main menu
  3. Medical Personnel Login ("med_login")
        -- Show appointments
  4. Exit the application ("exit")
  
  
  --- Functionality ---
  
--Add appointment
--Edit appointment
--Delete appointment
--Print list of appointment for specific date(for medical personnel)
--User input validations (name, email, phone number, ID number, date, time)

Application Screenshots
</pre>

Installation            |  Running the Application
:-------------------------:|:-------------------------:
![Install DB 1](https://user-images.githubusercontent.com/70884391/151970062-b6bf9902-56f9-4e7b-a6de-885230a6defb.png)|![Running App 1](https://user-images.githubusercontent.com/70884391/151969713-e195770b-806a-4efd-bbf1-0f9f34b6e977.png)

Register for appointment | Input Validation
:-------------------------:|:-------------------------:
![User Reg 1](https://user-images.githubusercontent.com/70884391/151971746-fec05344-969e-4982-ac31-c9cc6de5d5c1.png)|![Input Validation 1](https://user-images.githubusercontent.com/70884391/151972123-20f18aae-87b2-4ce3-9378-bf9e5976c152.png)

Correct Input | User Information
:-------------------------:|:-------------------------:
![Correct Input 1](https://user-images.githubusercontent.com/70884391/151972804-97119fe2-a6e8-407d-996a-9d17f274206d.png)|![Personal Info 1](https://user-images.githubusercontent.com/70884391/151972822-e3e51cd5-8dd9-4e85-af1c-a944ce4a01aa.png)

Edit Info | Example: Edit Date
:-------------------------:|:-------------------------:
![Edit Info 1](https://user-images.githubusercontent.com/70884391/151973640-327db2de-fc58-4ccb-9cdb-fffd01bc9926.png)|![Edit Date Example](https://user-images.githubusercontent.com/70884391/151973705-d1b97365-f7ea-4b5f-8877-af73f20212fc.png)

User Login | Delete Profile
:-------------------------:|:-------------------------:
![User Login 1](https://user-images.githubusercontent.com/70884391/151974421-a303fe65-ab67-4d05-a6c4-c6c488d66bb9.png)|![Delete Profile](https://user-images.githubusercontent.com/70884391/151974443-9e4d7a49-c889-4c43-a705-fef18b42ee40.png)

Medical Personnel Login | Appointment Dates
:-------------------------:|:-------------------------:
![Personnel Login](https://user-images.githubusercontent.com/70884391/151976367-69344b30-6d27-4792-8cce-ae1ec113bcf4.png)|![View Dates](https://user-images.githubusercontent.com/70884391/151976420-735cd75d-9155-4e57-8399-f7708c72c0fc.png)

Date Details
:-------------------------:
![Date Details](https://user-images.githubusercontent.com/70884391/151976676-e23ce148-c898-4e11-b40d-1573992f6c33.png)
