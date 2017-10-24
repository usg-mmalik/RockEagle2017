<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Rock Eagle 2017</title>
    <style type = "text/css">
        table.plain
        {
          border-color: transparent;
          border-collapse: collapse;
        }

        table td.plain
        {
          padding: 5px;
          border-color: transparent;
        }

        table th.plain
        {
          padding: 6px 5px;
          text-align: left;
          border-color: transparent;
        }

        tr:hover
        {
            background-color: transparent !important;
        }

        .error
        {
            color: #FF0000;
        }
    </style>
    <script src="sample.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type = "text/javascript"></script>
</head>
<body>

<h1>The Ultimate Guide To Brightspace by D2L Webservices & INGRESS Integration</h1>
<h3>Demo 1: Retrieve Latest & Supported Versions:</h3>
    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL:</b></td><td>/d2l/api/versions/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>GET</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_01.php' target="_blank">demo 01</a> </td><tr>
    </table>
            
<h3>Demo 2: Retrieve Org Information</h3>

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL:</b></td><td>/d2l/api/lp/1.0/organization/info</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>GET</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_02.php' target="_blank">demo 02</a> </td><tr>
    </table>
        
<h3>Demo 3: Retrieve Org Structure</h3>

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL:</b></td><td>/d2l/api/lp/1.0/orgstructure/(orgUnitID)/children/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>GET</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_03.php' target="_blank">demo 03</a> </td><tr>
    </table>
        
<h3>Demo 4: Retrieve Role List</h3>

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL:</b></td><td>/d2l/api/lp/1.0/roles/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>GET</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_04.php' target="_blank">demo 04</a> </td><tr>
    </table>

<h3>Demo 5: Create New User</h3> 	

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL:</b></td><td>/d2l/api/lp/1.0/users/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>POST</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>JSON:</b></td><td> {<br>
                      "OrgDefinedId": "rockeagle",<br>
                      "FirstName": "Rock",<br>
                      "MiddleName": "",<br>
                      "LastName": "Eagle",<br>
                      "ExternalEmail": "mazhar.malik@usg.edu",<br>
                      "UserName": "rockeagle",<br>
                      "RoleId": "157",<br>
                      "IsActive": "true",<br>
                      "SendCreationEmail": "false"<br>
                    }<br></td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_05.php' target="_blank">demo 05</a> </td><tr>
    </table>
        
<h3>Demo 6: Retrieve User Data</h3>

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL (Update URL):</b></td><td>/d2l/api/lp/1.0/users/(user_id)</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>GET</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_06.php' target="_blank">demo 06</a></td><tr>
    </table>

<h3>Demo 7: Update User</h3> 		

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL (Update URL):</b></td><td>/d2l/api/lp/1.0/users/(userId)</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>PUT</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>JSON:</b></td><td> {<br>
                      "OrgDefinedId": "rockeagle",<br>
                      "FirstName": "Rock",<br>
                      "MiddleName": "",<br>
                      "LastName": "Eagle",<br>
                      "ExternalEmail": "rock.eagle@usg.edu",<br>
                      "UserName": "rockeagle",<br>
                        "Activation": {<br>
                            "IsActive": true<br>
                        }<br>
                    }<br></td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_07.php' target="_blank">demo 07</a></td><tr>
    </table>

<h3>Demo 8: Create New Template</h3>

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL:</b></td><td>/d2l/api/lp/1.0/coursetemplates/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>POST</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>JSON:</b></td><td> {<br>
                        "Name": "Rock Eagle Template",<br>
                        "Code": "template.rockeagle",<br>
                        "Path": "",<br>
                        "ParentOrgUnitIds": ["6986"]<br>
                    }<br></td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_08.php' target="_blank">demo 08</a></td><tr>
    </table>

<h3>Demo 9: Create Course Offering</h3>

    <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL (Update URL):</b></td><td>/d2l/api/lp/1.0/courses/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>POST</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>JSON:</b></td><td> {<br>
                        "Name": "Rock Eagle 2017",<br>
                        "Code": "CO.rockeagle",<br>
                        "Path": "",<br>
                        "CourseTemplateId": "(Template OrgID)",<br>
                        "SemesterId": null,<br>
                        "StartDate": null,<br>
                        "EndDate": null,<br>
                        "LocaleId": null,<br>
                        "ForceLocale": false,<br>
                        "ShowAddressBook": false<br>
                    }<br></td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_09.php' target="_blank">demo 09</a></td><tr>
    </table>

<h3>Demo 10: User Enrollment in Course Offering</h3>

   <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL (Update URL):</b></td><td>/d2l/api/lp/1.0/enrollments/</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>POST</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>JSON:</b></td><td> {<br>
                        "OrgUnitId": "(Course Offering OrgID)",<br>
                        "UserId": "(User OrgID)",<br>
                        "RoleId": "157"<br>
                    }<br></td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_10.php' target="_blank">demo 10</a></td><tr>
    </table>
<!--
<h3>Demo 11: Retrieve Final Grade</h3>

   <table cellpadding='2' cellspacing='1'>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>URL (Update URL):</b></td><td>/d2l/api/le/1.0/(Course Offering OrgID)/grades/final/values/(userId)</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Method:</b></td><td>GET</td><tr>
        <tr style='background-color:#E5F2FB;'><td width=150px><b>Execute:</b></td><td><a href ='demo_11.php' target="_blank">demo 11</a></td><tr>
    </table>
    -->
</body>
</html>
                
                            

