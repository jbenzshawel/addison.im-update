<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title>addison.im - Addison Benzshawel</title>
    <!-- styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="/">Addison Benzshawel</a>
            </div> <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about">About</a></li>
                    <li><a href="#work">Work</a></li>
                    <li><a href="http://addison.im/blog/public/posts">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul> <!-- /.nav.navbar-nav.navbar-right -->
            </div> <!-- /.collapse.navbar-collapse -->
        </div> <!-- /.container -->
    </nav><!-- /.navbar -->
    <div class="container-fluid">
        <div class="row profile">
            <div class="col-sm-12 col-md-5">
                <img src="img/profile-2.jpg" alt="Profile Image" class="profile-img" />            
            </div> <!-- /.col-sm-12.col-md-5 -->
            <div class="col-sm-12 col-md-7 welcome">
                <p>Hi my name is Addison Benzshawel</p>
                <p>I like to program, make music, and develop ideas.</p>
            </div> <!-- /.col-sm-12.col-md-7.welcom e-->
        </div> <!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3 about">
                <a id="about"></a>
                <h1>About me</h1>
                <p>I am a software develper interested in music, web development, programming, and engineering. Through this website I plan on documenting various side projects that I am working on as well as share new music or useful articles.</p>
            </div> <!-- /.col-xs-10.col-xs-offset-1 -->
        </div> <!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1 work">
                <a id="work"></a>
                <h1>Work</h1>
                <div class="col-sm-12 col-md-6">
                    <h3>Web Development</h3>
                    <p>I currently work as a software developer in addition to freelancing and working on side projects. I have experience with responsive web design and building web applications using C#.NET and LAMP / Laravel.</p>
                </div> <!-- /.col-sm-12.col-md-7 -->
                <div class="col-sm-12 col-md-6">
                    <h3>Something Else</h3>
                    <p>Lorum ipsum malde Lorum ipsum malde Lorum ipsum malde Lorum ipsum malde Lorum ipsum malde Lorum ipsum malde Lorum ipsum malde Lorum ipsum malde</p>
                </div> <!-- /.col-sm-12.col-md-7 -->
            </div> <!-- /.col-sm-12.col-md-10.col-md-offset-1.work -->
        </div> <!-- /.row -->
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1 blog">
                <h1>Blog</h1>
                <div id="posts">
                    <!-- posts loaded here -->
                </div>
            </div>
        </div>
    </div> <!-- /.container-fluid -->

      <footer>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 contact">
                <form id="contactForm">
                    <div id="statusMsg"></div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control"></textarea>    
                    </div>
                    <div class="center-button">
                        <button class="btn btn-default" type="submit" id="sendForm">Submit</button>                    
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="scripts/main.js" type="text/javascript"></script>
</body>
</html>