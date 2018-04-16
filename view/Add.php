<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
</head>
<body>
<h2>Header</h2>
<a href="<?= ConfigApp::getBaseUrl() ?>">Home page</a>

<hr>
<form id="form" name="addTaskForm" method="POST" action="<?=ConfigApp::actionAddTask()?>" enctype="multipart/form-data">

    <table>
        <div width="450px" id="form-wrapper">

            <tbody id="form-content">
            <tr>
                <td valign="top">
                    <label for="name">Name *</label>
                </td>
                <td valign="top">
                    <input class="inp" type="text" name="user[name]" required maxlength="50" size="44" value="">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="email">Email *</label>
                </td>
                <td valign="top">
                    <input class="inp" type="text" name="user[email]" required maxlength="80" size="44">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="comments">Text *</label>
                </td>
                <td valign="top">
                    <textarea class="inp" name="task[text]" required maxlength="1000" cols="45" rows="6"></textarea>
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td valign="top">
                    <label for="comments">Image *</label>
                </td>
                <td valign="top">
                    <input name="img" required type="file">
                </td>
            </tr>
            </tbody>

        </div>
        <tr>
            <td colspan="2" style="text-align:left">
                <input type="submit" value="Add Task">
            </td>
        </tr>
    </table>

    <!--    <button id="pr-view">Previous view</button>-->
</form>
<hr>
<h3>Footer</h3>
</body>
</html>

<!-- Trigger/Open The Modal -->
<button id="previewOpen">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
    </div>

</div>

<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 10% auto; /* 10% from the top and centered */
        padding: 20px;
        border: 2px solid black;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        display: none;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<script>

    function makeHtmlFormReadonly(formName, isReadonly) {
        var f = document.forms[formName];
        for (var i = 0, fLen = f.length; i < fLen; i++) {
            f.elements[i].readOnly = isReadonly;//As @oldergod noted, the "O" must be upper case
        }
    }


    var formContent = document.getElementById('form-content');
    var formWrapper = document.getElementById('form-wrapper');

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("previewOpen");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";

        modal.appendChild(formContent);
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        formWrapper.appendChild(formContent);
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            formWrapper.appendChild(formContent);
        }
    }
</script>