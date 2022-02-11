
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8" />
    
            
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Previse rocks your socks." />
        <meta name="author" content="m4lwhere" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
   

<title>Previse Files</title>
</head>
<body>

<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="/index.php">Home</a></li>
            <li>
                <a href="accounts.php">ACCOUNTS</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="accounts.php">CREATE ACCOUNT</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="files.php">FILES</a></li>
            <li>
                <a href="status.php">MANAGEMENT MENU</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="status.php">WEBSITE STATUS</a></li>
                        <li><a href="file_logs.php">LOG DATA</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#" class=".uk-text-uppercase"></span></a></li>
            <li>
                <a href="logout.php">
                    <button class="uk-button uk-button-default uk-button-small">LOG OUT</button>
                </a>
            </li>
        </ul>
    </div>
</nav>

    <section class="uk-section uk-section-default">
        <div class="uk-container">
            <h2 class="uk-heading-divider">Files</h2>
            <p></p>
            <p>Upload files below, uploaded files in table below</p>
            <form name="upload" enctype="multipart/form-data" action="" method="post">
                <div uk-form-custom="target: true">
                    <input name="userData" type="file">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
                </div>
                <button class="uk-button uk-button-default" type="submit" value="Submit">Submit</button>
            </form>
        </div>
        <div class="uk-container">
            <br>
            <h2 class="uk-heading-divider">Uploaded Files</h2>
    
<table class="uk-table uk-table-hover uk-table-divider">
            <thead>
            <tr>
                <th class="uk-table-shrink">#</th>
                <th class="uk-table-expand">Name</th>
                <th>Size</th>
                <th>User</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href='download.php?file=32'><button class="uk-button uk-button-text">siteBackup.zip</button></a></td>
                    <td>9948</td>
                    <td>newguy</td>
                    <td>2021-06-12 11:14:34</td>
                    <td><form action="files.php" method="post">
                        <button class="uk-button uk-button-danger uk-button-small" type="button" uk-toggle="target: #offcanvas-flip1">Delete</button>
                        <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
                            <div class="uk-offcanvas-bar">
                                <button class="uk-offcanvas-close" type="button" uk-close></button>
                                <h3>Delete File</h3>
                                <p>Are you sure you want to delete this file?</p>
                                <button class="uk-button uk-button-danger uk-button-small" type="submit" name="del" value="32">Delete</button>
                            </div>
                        </div>
                    </form></td>
                </tr></tbody></table></div>        </div>
    </section>
    
<div class="uk-position-bottom-center uk-padding-small">
	<a href="https://m4lwhere.org/" target="_blank"><button class="uk-button uk-button-text uk-text-small">Created by m4lwhere</button></a>
</div>
</body>
</html>
