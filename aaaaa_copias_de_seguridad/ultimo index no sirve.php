<html lang="es" >

<head>
  <meta charset="UTF-8">
  <title>Menu admin</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel='stylesheet' href='css/bqngbz.css'>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <input id="hamburger" class="hamburger" type="checkbox" />
<label for="hamburger" class="hamburger">
    <i></i>
  <text>
      <close>close</close>
      <open>menu</open>
    </text>
  </label>
  <nav class="primnav">
    <ul>
      <li>
        <a title="Dashboard" href="#dashboard">
          <svg class="icon"><use xlink:href="#icon-th-large"></use></svg> Dashboard
        </a>
      </li>
      <li>
        <a title="Mail" href="#mail">
          <svg class="icon"><use xlink:href="#icon-mail_outline"></use></svg> Mail
          <div class="tag">53</div>
        </a>
        <ul class="secnav">
          <li>
            <a title="Inbox" href="#inbox">Inbox</a>
          </li>
          <li>
            <a title="Sent" href="#sent">Sent</a>
          </li>
        </ul>
      </li>
      <li>
        <a title="Notifications" href="#notifications">
          <svg class="icon"><use xlink:href="#icon-bell2"></use></svg> Notifications
          <div class="tag">17</div>
        </a>
      </li>
      <li>
        <a title="System Administration" href="#sysadmin">
          <svg class="icon"><use xlink:href="#icon-equalizer"></use></svg> System Administration
        </a>
        <ul class="secnav">
          <li>
            <a title="Users" href="#users">Users</a>
          </li>
          <li>
            <a title="Lists" href="#lists">Lists</a>
          </li>
          <li>
            <a title="Calendar" href="#calendar">Calendar</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>

<user id="user">
  <section>
    <img src="https://randomuser.me/api/portraits/women/85.jpg" />
    <section>
      <name>Sarah Dekhard</name>
      <actions><a href="#settings">settings</a> | <a href="#logout">logout</a></actions>
    </section>
  </section>
</user>

<content>
  <nav class="tabs">
  </nav>

</content>

<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
  <symbol id="icon-expand" viewBox="0 0 27 32">
<title>expand</title>
<path class="path1" d="M13.482 18.857c0 0.143-0.071 0.304-0.179 0.411l-5.929 5.929 2.571 2.571c0.214 0.214 0.339 0.5 0.339 0.804 0 0.625-0.518 1.143-1.143 1.143h-8c-0.625 0-1.143-0.518-1.143-1.143v-8c0-0.625 0.518-1.143 1.143-1.143 0.304 0 0.589 0.125 0.804 0.339l2.571 2.571 5.929-5.929c0.107-0.107 0.268-0.179 0.411-0.179s0.304 0.071 0.411 0.179l2.036 2.036c0.107 0.107 0.179 0.268 0.179 0.411zM27.429 3.429v8c0 0.625-0.518 1.143-1.143 1.143-0.304 0-0.589-0.125-0.804-0.339l-2.571-2.571-5.929 5.929c-0.107 0.107-0.268 0.179-0.411 0.179s-0.304-0.071-0.411-0.179l-2.036-2.036c-0.107-0.107-0.179-0.268-0.179-0.411s0.071-0.304 0.179-0.411l5.929-5.929-2.571-2.571c-0.214-0.214-0.339-0.5-0.339-0.804 0-0.625 0.518-1.143 1.143-1.143h8c0.625 0 1.143 0.518 1.143 1.143z"></path>
</symbol>
    <symbol id="icon-bell2" viewBox="0 0 32 32">
  <title>bell2</title>
  <path class="path1" d="M32.047 25c0-9-8-7-8-14 0-0.58-0.056-1.076-0.158-1.498-0.526-3.532-2.88-6.366-5.93-7.23 0.027-0.123 0.041-0.251 0.041-0.382 0-1.040-0.9-1.891-2-1.891s-2 0.851-2 1.891c0 0.131 0.014 0.258 0.041 0.382-3.421 0.969-5.966 4.416-6.039 8.545-0.001 0.060-0.002 0.121-0.002 0.183 0 7-8 5-8 14 0 2.382 5.331 4.375 12.468 4.878 0.673 1.263 2.002 2.122 3.532 2.122s2.86-0.86 3.532-2.122c7.137-0.503 12.468-2.495 12.468-4.878 0-0.007-0.001-0.014-0.001-0.021l0.048 0.021zM25.82 26.691c-1.695 0.452-3.692 0.777-5.837 0.958-0.178-2.044-1.893-3.648-3.984-3.648s-3.805 1.604-3.984 3.648c-2.144-0.18-4.142-0.506-5.837-0.958-2.332-0.622-3.447-1.318-3.855-1.691 0.408-0.372 1.523-1.068 3.855-1.691 2.712-0.724 6.199-1.122 9.82-1.122s7.109 0.398 9.82 1.122c2.332 0.622 3.447 1.318 3.855 1.691-0.408 0.372-1.523 1.068-3.855 1.691z"></path>
  </symbol>

  <symbol id="icon-home2" viewBox="0 0 32 32">
<title>home2</title>
<path class="path1" d="M16 1l-16 16 3 3 3-3v13h8v-6h4v6h8v-13l3 3 3-3-16-16zM16 14c-1.105 0-2-0.895-2-2s0.895-2 2-2c1.105 0 2 0.895 2 2s-0.895 2-2 2z"></path>
</symbol>
  <symbol id="icon-cart" viewBox="0 0 32 32">
<title>cart</title>
<path class="path1" d="M12 29c0 1.657-1.343 3-3 3s-3-1.343-3-3c0-1.657 1.343-3 3-3s3 1.343 3 3z"></path>
<path class="path2" d="M32 29c0 1.657-1.343 3-3 3s-3-1.343-3-3c0-1.657 1.343-3 3-3s3 1.343 3 3z"></path>
<path class="path3" d="M32 16v-12h-24c0-1.105-0.895-2-2-2h-6v2h4l1.502 12.877c-0.915 0.733-1.502 1.859-1.502 3.123 0 2.209 1.791 4 4 4h24v-2h-24c-1.105 0-2-0.895-2-2 0-0.007 0-0.014 0-0.020l26-3.98z"></path>
</symbol>
  <symbol id="icon-equalizer" viewBox="0 0 32 32">
<title>equalizer</title>
<path class="path1" d="M14 4v-0.5c0-0.825-0.675-1.5-1.5-1.5h-5c-0.825 0-1.5 0.675-1.5 1.5v0.5h-6v4h6v0.5c0 0.825 0.675 1.5 1.5 1.5h5c0.825 0 1.5-0.675 1.5-1.5v-0.5h18v-4h-18zM8 8v-4h4v4h-4zM26 13.5c0-0.825-0.675-1.5-1.5-1.5h-5c-0.825 0-1.5 0.675-1.5 1.5v0.5h-18v4h18v0.5c0 0.825 0.675 1.5 1.5 1.5h5c0.825 0 1.5-0.675 1.5-1.5v-0.5h6v-4h-6v-0.5zM20 18v-4h4v4h-4zM14 23.5c0-0.825-0.675-1.5-1.5-1.5h-5c-0.825 0-1.5 0.675-1.5 1.5v0.5h-6v4h6v0.5c0 0.825 0.675 1.5 1.5 1.5h5c0.825 0 1.5-0.675 1.5-1.5v-0.5h18v-4h-18v-0.5zM8 28v-4h4v4h-4z"></path>
</symbol>
  <symbol id="icon-mail_outline" viewBox="0 0 32 32">
<title>mail_outline</title>
<path class="path1" d="M16 14.688l10.688-6.688h-21.375zM26.688 24v-13.313l-10.688 6.625-10.688-6.625v13.313h21.375zM26.688 5.313c1.438 0 2.625 1.25 2.625 2.688v16c0 1.438-1.188 2.688-2.625 2.688h-21.375c-1.438 0-2.625-1.25-2.625-2.688v-16c0-1.438 1.188-2.688 2.625-2.688h21.375z"></path>
</symbol>
  <symbol id="icon-enlarge2" viewBox="0 0 32 32">
<title>enlarge2</title>
<path class="path1" d="M32 0v13l-5-5-6 6-3-3 6-6-5-5zM14 21l-6 6 5 5h-13v-13l5 5 6-6z"></path>
</symbol>
  <symbol id="icon-th-large" viewBox="0 0 30 32">
<title>th-large</title>
<path class="path1" d="M13.714 18.286v6.857c0 1.25-1.036 2.286-2.286 2.286h-9.143c-1.25 0-2.286-1.036-2.286-2.286v-6.857c0-1.25 1.036-2.286 2.286-2.286h9.143c1.25 0 2.286 1.036 2.286 2.286zM13.714 4.571v6.857c0 1.25-1.036 2.286-2.286 2.286h-9.143c-1.25 0-2.286-1.036-2.286-2.286v-6.857c0-1.25 1.036-2.286 2.286-2.286h9.143c1.25 0 2.286 1.036 2.286 2.286zM29.714 18.286v6.857c0 1.25-1.036 2.286-2.286 2.286h-9.143c-1.25 0-2.286-1.036-2.286-2.286v-6.857c0-1.25 1.036-2.286 2.286-2.286h9.143c1.25 0 2.286 1.036 2.286 2.286zM29.714 4.571v6.857c0 1.25-1.036 2.286-2.286 2.286h-9.143c-1.25 0-2.286-1.036-2.286-2.286v-6.857c0-1.25 1.036-2.286 2.286-2.286h9.143c1.25 0 2.286 1.036 2.286 2.286z"></path>
</symbol>
</defs>
</svg>
    <script  src="./script.js"></script>
</body>
</html>
