/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myDropdown()
{
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event)
{
  if (!event.target.matches('.dropbtn'))
  {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++)
    {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show'))
      {
        openDropdown.classList.remove('show');
      }
    }
  }
}

//chat dropdown
function myDropdownChat()
{
  document.getElementById("myDropdownChat").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event)
{
  if (!event.target.matches('.dropbtnChat'))
  {
    var dropdownsChat = document.getElementsByClassName("dropdownChat-content");
    var i;
    for (i = 0; i < dropdownsChat.length; i++)
    {
      var openDropdownChat = dropdownsChat[i];
      if (openDropdownChat.classList.contains('show'))
      {
        openDropdownChat.classList.remove('show');
      }
    }
  }
}



/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropbtn");
var i;

for (i = 0; i < dropdown.length; i++)
{
  dropdown[i].addEventListener("click", function()
  {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block")
    {
      dropdownContent.style.display = "none";
    }
    else
    {
      dropdownContent.style.display = "block";
    }
  });
}



//detect scroll down
window.onscroll = function() {scrollFunction()};

function scrollFunction()
{
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
  {
    document.getElementById("backToTopBtn").style.display = "block";
  }
  else
  {
    document.getElementById("backToTopBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction()
{
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


//tabs for profile
function openCity(evt, cityName)
{
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++)
  {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++)
  {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

//darkmode


function darkmodeFunction()
{
  var element = document.body;
  // element.classList.toggle("dark-mode");
  // footer.classList.toggle("dark-mode");

  if (element.classList.contains('dark-mode'))
  {
    element.classList.remove('dark-mode');
  }
  else
  {
    element.classList.add('dark-mode');
  }
}

var checked = JSON.parse(localStorage.getItem('checkbox'));
if (checked == true) {
    document.getElementById("checkbox").checked = true;
}


function save(){
    var checkbox = document.getElementById('checkbox');
    localStorage.setItem('checkbox', checkbox.checked);
}

function load(){
    var element = document.body;
    var checked = JSON.parse(localStorage.getItem('checkbox'));
    if (document.getElementById("checkbox").checked = checked)
    {
      element.classList.add('dark-mode');
    }
    else
    {
      element.classList.remove('dark-mode');
    }

}


//active nav link
// $(".link > a").click(function() {             // when clicking any of these links
//     $(".link > a").removeClass("active"); // remove highlight from all links
//     $(".link > a").addClass("active");          // add highlight to clicked link
// });

// $(".topnav > a").click(function() {             // when clicking any of these links
//     $(".topnav > a").removeClass("activelink"); // remove highlight from all links
//     $(".topnav > a").addClass("activelink");          // add highlight to clicked link
// });
//
// $("a").click(function() {             // when clicking any of these links
//     $("a").removeClass("activelink"); // remove highlight from all links
//     $("a").addClass("activelink");          // add highlight to clicked link
// });

// for (var i = 0; i < document.links.length; i++)
// {
//     if (document.links[i].href == document.URL)
//     {
//         document.links[i].className = 'active';
//     }
// }


// function validateEmail() {
//   const registrationForm = document.getElementById('registrationForm');
//   const email = document.getElementById('email').value;
//   const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/

//   if(email.match(pattern)){
//     registrationForm.classList.add('valid')
//   }
//   else {
//     registrationForm.classList.add('invalid')
//     // registrationForm.classList.add('valid')
//     registrationForm.classList.remove('valid')
//   }
// }

function validateEmail() {
  const emailInput = document.getElementById('emailInput');
  const email = document.getElementById('email').value;
  const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/

  if(email.match(pattern)){
    emailInput.classList.add('valid')
    emailInput.classList.remove('invalid')
  }
  else {
    emailInput.classList.add('invalid')
    // registrationForm.classList.add('valid')
    emailInput.classList.remove('valid')
  }
}

function validateInput(page) {
  
  if (page == "registration")
  {
    const usernameInput = document.getElementById('usernameInput');
    const firstnameInput = document.getElementById('firstnameInput');
    const lastnameInput = document.getElementById('lastnameInput');
    const passwordInput = document.getElementById('passwordInput');
    const password2Input = document.getElementById('password2Input');
    
    const username = document.getElementById('username').value;
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const password = document.getElementById('password_1').value;
    const password2 = document.getElementById('password_2').value;
    

    if (username != "")
    {
        usernameInput.classList.add('valid')
    }
    if (firstname != "")
    {
      firstnameInput.classList.add('valid')
    }
    if (lastname != "")
    {
      lastnameInput.classList.add('valid')
    }

    if (password != "")
    {
        passwordInput.classList.add('valid')
    }
    else if (password == "")
    {
        passwordInput.classList.remove('valid')
    }
    if (password2 != "")
    { 
        password2Input.classList.add('valid')
        if (password != password2)
        {
            password2Input.classList.remove('valid')
        }
        else
        {
            password2Input.classList.add('valid')
        }
    }

    if (username == "")
    {
        usernameInput.classList.remove('valid')
    }
    if (firstname == "")
    {
      firstnameInput.classList.remove('valid')
    }
    if (lastname == "")
    {
      lastnameInput.classList.remove('valid')
    }
  }
  if (page == 'createNewPassword')
  {
    const passwordInput = document.getElementById('passwordInput');
    const password2Input = document.getElementById('password2Input');

    const password = document.getElementById('password_1').value;
    const password2 = document.getElementById('password_2').value;
    if (password != "")
    {
        passwordInput.classList.add('valid')
    }
    else if (password == "")
    {
        passwordInput.classList.remove('valid')
    }
    if (password2 != "")
    { 
        password2Input.classList.add('valid')
        if (password != password2)
        {
            password2Input.classList.remove('valid')
        }
        else
        {
            password2Input.classList.add('valid')
        }
    }
  }
  if (page == 'login')
  {
      const usernameInput = document.getElementById('usernameInput');
      const passwordInput = document.getElementById('passwordInput');
      const username = document.getElementById('username').value;
      const password = document.getElementById('password_1').value;
      

    if (password != "")
    {
        passwordInput.classList.add('valid')
    }
    else if (password == "")
    {
        passwordInput.classList.remove('valid')
    }
    if (username != "")
    {
        usernameInput.classList.add('valid')
    }
    else if (username == "")
    {
        usernameInput.classList.remove('valid')
    }
  }
}

function validateConfirmPassword() {
  const password2Input = document.getElementById('password2Input');

  const password2 = document.getElementById('password_2').value;

  if (password2 == password){
    password2Input.classList.add('valid')

  }
  else 
  {
    password2Input.classList.remove('valid')
  }

}