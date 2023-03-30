# Human Resource Email Support System
Human Resource Email Support System is my Internship Project at GECO Philippine Incorporation. This project intended to help HR to send multiple files in multiple and single email. Also it uses CRUD functionality to add, update, edit and delete data. 
It has features to archive all data and view history of the email status either send or fail.

# Technologies Used
* HTML5, CSS3, PHP, Javascript, MySQL, JQuery, AJAX
* Bootstrap, Sweet Alert, Xampp, Composer tools, PHPMailer API's

# Main Page
![hr1](https://user-images.githubusercontent.com/80078725/228458961-8d1b1f94-5da4-4fac-8f45-78ea90171a91.png)


# Getting Started 
This is an example of how you may give instructions on setting up your project locally. To get a local copy up and running follow these simple example steps.


## Development
Before running a PHP script, you must know where to write it. 
In the XAMPP directory, there exists a folder called “htdocs”. This is where all the programs for the web pages will be stored.
Now, to run a PHP script:

1. Go to “C:\xampp\htdocs” and inside it, create a folder. Let’s call it “demo”. It’s considered good practice to create a new folder for every project you work on.
2. Inside the demo folder, create a new text file and name it “index.php” and write the following script.
3. Now, to see the script output, open the XAMPP control panel and start Apache to host the local webserver, where our script will be running.
4. Now navigate to your browser and type in “localhost/demo/” in the address bar to view the output.


# Guidelines to HR Email Support System
 <b>Geco Asia Logo </b> -  <i>logo is used to link to the system's home page.</i> <br> <br>

 <b>Archive</b> -  <i>is linked to the archive page where accounts of emails are stored if not in use.</i> <br> <br>
 
 <b>Email Button</b> - <i>is a link to the archive page where employees accounts are kept when not in use.</i> <br> <br>

 <b>Track Email Button</b> - <i>is linked to the track email page where the HR can check the status of emails that are sent to the recipient emails.</i> <br> <br>

 <b>Question Mark</b> - <i>is a button to see the guidelines on what are the features of each functionality of the system.</i> <br> <br>

 <b>Add Email Button</b> - <i>is used to register email accounts to the system.</i>  <br> <br>

 <b>Archive All Accounts Button</b> - <i>is used to archive all of the accounts of emails that is registered and will be saved to archive database.</i> <br> <br>

 <b>Export Button</b> -  <i>button used to export account details of emails that are currently registered to the system to excel file.</i> <br> <br>

 <b>Show Entries Dropdown</b> -  <i>the dropdown will control the amount of accounts that is being shown to the tables.</i> <br> <br>

 <b>Search Bar</b> - <i>is used to search a specific account of emails.</i> <br> <br>

 <b>Edit Button</b> - <i>is used to edit the credentials of the emails account that is registered to the system.</i> <br> <br>

 <b>Delete Button</b> - <i>is used to delete the specific account of an emails that is terminated or can't be accessed by the companies.</i> <br> <br>

 <b>Single Archive Button</b> - <i>the button will archive the specific account that is not being used by the emails and will be saved to the archive database.</i>   <br> <br>
                                 
# How the System Works?
1. Adding name and email to the system.

![email1](https://user-images.githubusercontent.com/80078725/228465691-00631542-61d8-47dc-867f-17abe578398e.png)

2. Once it done, the system will display the user's name and email address.

![email2](https://user-images.githubusercontent.com/80078725/228466582-22bde5da-3f45-4ab6-bc56-b4ad9c400716.png)

3. Be sure that just one name and email will be used before adding them; if more are added, the system will provide a warning.

![email3](https://user-images.githubusercontent.com/80078725/228467481-568f89f1-7c6a-49b4-88b8-396857b3176d.png)
![email4](https://user-images.githubusercontent.com/80078725/228467600-283b063a-eeba-4a9b-a769-c3854ef6750c.png)

4. The information will be stored in a database.

![email5](https://user-images.githubusercontent.com/80078725/228468174-1d949df6-e434-4dce-92fa-c0c124882b46.png)

5. You can also update the user's name and email address, and the database will update the data automatically.

![update1](https://user-images.githubusercontent.com/80078725/228469646-263e0db5-3545-4ea3-a1f0-791e58d6f2f2.png)
![update2](https://user-images.githubusercontent.com/80078725/228469717-7d87f925-de66-4f07-aaca-d17b4fd6972b.png)
![update3](https://user-images.githubusercontent.com/80078725/228469824-5219bcde-0f2c-4b55-8b5b-5f8d91e51332.png)
![update4](https://user-images.githubusercontent.com/80078725/228469904-08cc9c9b-ba70-442f-bc12-3238f40fe149.png)

6. You can also delete the user's name and email address, and automatically delete the record in the database.

![delete1](https://user-images.githubusercontent.com/80078725/228471638-8f4caa4e-8896-4932-a2eb-be57e28f52ad.png)
![delete2](https://user-images.githubusercontent.com/80078725/228471919-3bcc202a-9736-4a8b-b7c6-d75b9cb09b66.png)

7. The user's name and email address can also be archived, after which the archived information will be preserved on the archives page, the data will be stored in the database, and the account can be retrieved.

![archive1](https://user-images.githubusercontent.com/80078725/228473811-8a3512e3-b447-4cd3-b49e-6c07554b7606.png)
![archive2](https://user-images.githubusercontent.com/80078725/228473919-89350000-d56c-436e-9f3c-0dcdfb9b1df8.png)
![archive3](https://user-images.githubusercontent.com/80078725/228473999-97b5b382-7c5a-4606-b186-bd78687b1a58.png)
![archivedata](https://user-images.githubusercontent.com/80078725/228494985-c611864f-d238-46e4-a14c-c8716186ea13.png)


8. Also, you can archive all account, which will store it immediately to the archives page and allow you to retrieve it.

![archiveall1](https://user-images.githubusercontent.com/80078725/228485479-9ccea2ee-66de-4f0c-8599-23db4f7fcc2f.png)
![archiveall2](https://user-images.githubusercontent.com/80078725/228485703-9f6136cb-8828-46f0-8a9f-392438d95ac9.png)

9. Data from the system will also be exported as a csv file.

![export1](https://user-images.githubusercontent.com/80078725/228485884-e0b37934-2536-4e7c-9e15-1e88ed12ee1e.png)
![export2](https://user-images.githubusercontent.com/80078725/228486187-25d87f54-62b9-4427-9208-f8e74cc10846.png)

10. You can see every record and retrieve it if you need to access the data again, as well as the date the data was stored, on the archive page, where the archive name and email address will also be saved.

![archivepage1](https://user-images.githubusercontent.com/80078725/228705971-abe2cd72-2c3d-4fde-b2a4-e4454678ef42.png)
![archivepage2](https://user-images.githubusercontent.com/80078725/228706029-907e3d59-579d-44a1-9240-ddc3fbf1fe80.png)
![archivepage3](https://user-images.githubusercontent.com/80078725/228706521-8ce7e9d1-61a0-409a-9490-db451b09e42a.png)
 
11. This is the email page where you can compose and send emails to both single and multiple recipients. You had to enter the sender's name, email address, subject, file attachments, recipient emails, and message on the right-side panel. You can see the name, email address, and a select option to choose the receiver of your email in the left side panel. Following that, you can click the send email button and reset the information by clicking the reset form button.

![emailpage1](https://user-images.githubusercontent.com/80078725/228713765-8bf7b254-cdd5-4243-b45d-f499874a27d0.png)
![emailpage2](https://user-images.githubusercontent.com/80078725/228713817-55b08316-deb0-4bdc-ac8d-d9d56d2db539.png)
![emailpage3](https://user-images.githubusercontent.com/80078725/228713857-0059c84e-c406-43c7-9b42-92c97821a67f.png)
![emailpage4](https://user-images.githubusercontent.com/80078725/228713909-6ad6ba1b-fbc7-4177-a835-e0adb772a44b.png)




