<!DOCTYPE html>
<html>
<head>
    <title>Settings</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
	    h1 {
        font-size: 36px;
        margin: 20px;
    }

    h2 {
        font-size: 24px;
        margin: 20px;
    }

    form {
        margin: 20px;
    }

    label {
        display: inline-block;
        width: 150px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    input[type="submit"],
    button {
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        background-color: #008CBA;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-right: 10px;
    }

    input[type="submit"]:hover,
    button:hover {
        background-color: #005f6b;
    }

    button {
        background-color: #dc3545;
    }

    button:hover {
        background-color: #c82333;
    }

</style>

</head>
<body>
    <h1>Settings</h1>

    <h2>Notification Settings</h2>
    <form>
        <label for="email-notifications">Email Notifications:</label>
        <input type="checkbox" id="email-notifications" name="email-notifications" checked><br><br>

        <label for="sms-notifications">SMS Notifications:</label>
        <input type="checkbox" id="sms-notifications" name="sms-notifications"><br><br>

        <label for="push-notifications">Push Notifications:</label>
        <input type="checkbox" id="push-notifications" name="push-notifications" checked><br><br>

        <input type="submit" value="Save Notification Settings">
    </form>

    <h2>Appearance Settings</h2>
    <form>
        <label for="theme">Theme:</label>
        <select id="theme" name="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select><br><br>

        <label for="font-size">Font Size:</label>
        <select id="font-size" name="font-size">
            <option value="small">Small</option>
            <option value="medium" selected>Medium</option>
            <option value="large">Large</option>
        </select><br><br>

        <input type="submit" value="Save Appearance Settings">
    </form>

    <h2>Account Settings</h2>
    <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <button type="submit" name="save_account_settings">Save Account Settings</button>
        <button type="submit" name="delete_account">Delete Account</button>
        <button type="submit" name="browse_bookmarks">Browse Bookmarks</button>
    </form>
</body>
</html>
