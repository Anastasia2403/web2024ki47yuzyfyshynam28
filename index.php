<?php
include('./config.php');

$login_button_google = '';
$login_button_def = '';

if(isset($_GET["code"]))
{
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  if(!isset($token['error']))
  {
    $google_client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    if(!empty($data['given_name']))
    {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if(!empty($data['family_name']))
    {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if(!empty($data['email']))
    {
      $_SESSION['user_email_address'] = $data['email'];
    }

    if(!empty($data['gender']))
    {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if(!empty($data['picture']))
    {
      $_SESSION['user_image'] = $data['picture'];
    }
  }
}

if(!isset($_SESSION['access_token']))
{
  $login_button_google = '<a href="'.$google_client->createAuthUrl().'"><img src="img/img.png" style="width: 100px; height: 50px;"  /></a>';
}

if(!isset($_SESSION['access_token']))
{
  $login_button_google = '<a href="'.$google_client->createAuthUrl().'"> Use Google </a>';
  $login_button_def .= '<form action="http://localhost:8080/login.php" method="post">';
  $login_button_def .= '<input type="email" name="email" placeholder="Email" required><br>';
  $login_button_def .= '<input type="password" name="password" placeholder="Password" required><br>';
  $login_button_def .= '<input type="submit" value="Login">';
  $login_button_def .= '</form>';}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CV - Yuzyfyshyn</title>
    <meta name="description" content="CV">
    <meta name="author" content="Fly Nerd">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="assets/main.js"></script>
</head>

<body>
<?php
if($login_button_google == '')
{
  echo '<h2>Welcome User</h2>';
  echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
  echo '<h3><a href="logout.php">Logout</h3></div>';
}
else
{
  echo '<div>'. $login_button_google . '</div>';
  echo '<div>'. $login_button_def . '</div>';
}
?>
<header>
    <div>
        <img src="img/avatar.png" alt="avatar"/>
    </div>
    <div class="wrapper">
        <h1 class="text">Anastasiia Yuzyphyshyn</h1>
        <section>
            <p class="text">Front End Developer with a strong education background in Computer
                Engineering and a passion for solving algorithmic tasks. Possessing Upper-
                intermediate English skills, I excel at effective communication in diverse teams.
                As a leader of a university group, I honed my leadership and organizational
                abilities, ensuring successful project outcomes. I have also participated in
                hackathons and competitions, demonstrating my ability to work seamlessly in a
                team, deliver results under tight deadlines, and embrace challenges with creativity
                and resourcefulness. With working not on one project I adeptly maintain open and
                clear communication with clients, ensuring their needs are comprehensively
                understood and effectively translated into project outcomes.</p>
            <a href="https://github.com/Anastasia2403" target="_blank">
                <i class="fab fa-github-alt"></i>
            </a>
        </section>
    </div>
</header>
<main>
    <section>
        <h3>Professional History - Front End Developer</h3>
        <article>
            <div class='job-title'>
                <strong>Holy Water</strong><br>
            </div>
            <div>
            <p><strong>Tech stack:</strong> JS, TS, React, Next.JS, Redux, HTML, CSS</p>
            <ul class="job-description">
                <li>Design and develop user-friendly interfaces that allow users to interact with the stories seamlessly.</li>
                <li>Work closely with designers and content creators to bring their visions to life.</li>
                <li>Conduct user testing to gather feedback on the user experience and iterate on the frontend design accordingly.</li>
            </ul>
            </div>
            <div class='job-title'>
                <strong>Chorus AI</strong><br>
            </div>
            <div>
                <p><strong>Tech stack:</strong> JS, TS, React, Next.JS, Redux, AntDesign</p>
                <ul class="job-description">
                    <li>Worked on optimizing the frontend for speed and performance.</li>
                    <li>Utilized Mapbox's tools to create an engaging and interactive user experience.</li>
                    <li>Developed a feature allowing users to leave comments, reply to others, and engage in productive discussions.</li>
                </ul>
            </div>
        </article>
        <article>
            <div class='job-title'>
                <strong>Instant Input</strong><br>
            </div>
            <div>
                <p><strong>Tech stack:</strong> JS, TS, React, Next.JS, Redux, MUI</p>
                <ul class="job-description">
                    <li>Creating interfaces for organizations that allow different users (tenants) to securely access and interact with their specific data.</li>
                    <li>Implementing user authentication and authorization processes to ensure data security and confidentiality.</li>
                    <li>Building interfaces that can be tailored or configured based on the individual needs of each user or tenant, including the option for different branding, themes, and functionalities.</li>
                </ul>
            </div>
        </article>
    </section>
    <section>
        <h3>Skills</h3>
        <div class='skills'>
            <div class='column'>
                <h4>Good knowledge</h4>
                <ul>
                    <li>JavaScript, ES6+</li>
                    <li>React</li>
                    <li>TypeScript</li>
                    <li>HTML5, CSS, Sass(SCSS), BEM</li>
                    <li>Next.js</li>
                    <li>Styled component</li>
                    <li>SQL</li>
                    <li>Fetch, REST API</li>
                </ul>
            </div>
            <div class='column'>
                <h4>Basic knowledge</h4>
                <ul>
                    <li>Redux</li>
                    <li>PHP</li>
                    <li>jQuery</li>
                    <li>Node.js</li>
                </ul>
            </div>
            <div>
                <h4>Languages</h4>
                <p>🇺🇦 Ukrainian - Native speaker</p>
                <p>🇬🇧 English - B2</p>
            </div>
        </div>
    </section>

    <section>
        <h3>Education</h3>
        <article>
            <div class='school'>
                <span>2020-2024</span> <strong>Lviv polytechnic national university</strong>
            </div>
        </article>
        <article>
            <div class='school'>
                <span>2023</span> <strong>Udemy - the complete JavaScript courses</strong>
            </div>
        </article>
        <article>
            <div class='school'>
                <span>2023</span> <strong>FreeCodeCamp - JavaScript algorithm and data structures & responsive web design</strong>
            </div>
        </article>
    </section>
    <section>
        <div id="demo">
            <h2>Contact me</h2>
            <button type="button" onclick="loadDoc()">Send form</button>
        </div>
    </section>
</main>
</body>
</html>
