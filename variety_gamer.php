<!DOCTYPE html> <!--
Copyright (c) 2023, Hayward @ PCGamers.win
All rights reserved.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this code and associated documentation files (the "Code"), to deal
in the Code without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Code, and to permit persons to whom the Code is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Code.

THE CODE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE CODE OR THE USE OR OTHER DEALINGS IN THE CODE.
-->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCGamers.win - What's your VARIETY gamer score?</title>
</head>
<body>
<?php
// Define the array of names
$names = array(
    'Alone in the Dark',
    'Hogwarts Legacy',
    'Wolfenstein 3D',
    'Doom',
    'Quake',
    'Half-Life',
    'Deus Ex',
    'LostArk',
    'Call of Duty',
    'World of Warcraft',
    'BioShock',
    'Portal',
    'Mass Effect',
    'Left 4 Dead',
    'The Forest',
    'Minecraft',
    'Dead Space',
    'Days Gone',
    'The Elder Scrolls: Skyrim',
    'The Sims',
    'The Walking Dead',
    'The Last of Us',
    'Grand Theft Auto V',
    'Dark Souls',
    'Undertale',
    'Overwatch',
    'PUBG',
    'Fortnite',
    'Apex Legends',
    'Among Us',
    'Final Fantasy',
    'Valheim',
    'Cyberpunk 2077',
    'Resident Evil 1-7',
    'Deathloop',
    'Back 4 Blood',
    'Halo Infinite',
    'Battlefield 2042',
    'Fall Guys',
    'Elden Ring',
    'Torchlight',
    'Diablo',
    'The Witcher 4',
    'God of War Ragnarok',
    'Gran Turismo 7',
    'Forza Horizon 5',
    'Fable',
    'Avowed',
    'Hellblade II',
    'Project Mara',
    'Gotham Knights',
    'Suicide Squad',
    'Atomic Heart',
    'Dying Light 2',
    'The Medium',
    'Horizon Forbidden West',
    'Sifu',
    'Death Stranding',
    'Disco Elysium',
    'Destiny 1-2',
    'Factorio',
    'Stardew Valley',
    'RimWorld',
    'Slay the Spire',
    'Hades',
    'Crusader Kings III',
    'Phasmophobia',
    'Genshin Impact',
    'Hitman 3',
    'Returnal',
    'Grounded',
    'Monster Hunter Rise',
    'It Takes Two',
    'Deaths Door',
    'The Division 1-2',
    'Death Trash',
    'The Forgotten City',
    'Red Dead Redemption 2',
    'Inscryption',
    'Loop Hero',
    'Chivalry II',
    'Evil Genius 2',
    'Humankind',
    'Age of Empires IV',
    'Total War Saga: Troy',
    'MS Flight Simulator',
    'DayZ',
    'Elite Dangerous',
    'Kerbal Space Program',
    'Factorio',
    'Satisfactory',
    'No Mans Sky',
    'Subnautica',
    'TerraTech',
    'Space Engineers',
    'Star Citizen',
    'Dual Universe',
    'EVE Online',
    'World of Warships',
    'League of Legends'
);

// Determine the number of names in the array
$num_names = count($names);

// Determine the number of rows needed to display all the names in four columns
// $num_rows = ceil($num_names / 4);

// Display the names in four columns with checkboxes and a counter
echo "<center><div><h1>What's your VARIETY gamer score?</h1></div>";
echo "<div><h2><span id='counter'>0</span>/100 Games Selected.</h2></div>";
echo "<div><strong>Select the games you've played below, then click Finished!</strong></div></center>";
echo "<p></p> ";
echo "<div id='nameTable'>";
$num_items = 100;
$num_columns = 4;
$items_per_column = ceil($num_items / $num_columns);
for ($i = 0; $i < $num_columns; $i++) {
    echo "<div class='column'>";
    for ($j = 0; $j < $items_per_column; $j++) {
        $index = $j * $num_columns + $i;
        if ($index < $num_items) {
            echo "\n<label><input type='checkbox' name='name[]' value='" . $names[$index] . "' onclick='updateCounter()'>" . $names[$index] . "</label>";
        }
    }
    echo "</div>";
}
echo "</div>";
// Add a "Finished" button to the page
echo "<p></p><center><button onclick='saveAsJPEG()'>Finished</button>";
echo "<p></p>";
echo "<p><strong>By Hayward for PCGamers.win</strong></p><p>Host it yourself: https://gist.github.com/haywardgb/d66a426afdf78b174d2168c21ad55fb3</p></center>";
?>


<!-- CSS styles for the page -->
<style>
#nameTable {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}
@media only screen and (max-width: 1200px) {
    #nameTable {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media only screen and (max-width: 900px) {
    #nameTable {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media only screen and (max-width: 600px) {
    #nameTable {
        grid-template-columns: repeat(1, 1fr);
    }
}
label {
    display: block;
}
</style>

<!-- JavaScript functions for the page -->
<script src='https://html2canvas.hertzen.com/dist/html2canvas.min.js'></script>
<script>
function updateCounter() {
    var checkboxes = document.getElementsByName('name[]');
    var counter = document.getElementById('counter');
    var count = 0;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            count++;
        }
    }
    counter.innerHTML = count;
}
function saveAsJPEG() {
    // Get the name table element
    var nameTable = document.getElementById('nameTable');

    // Create a new canvas with four columns
    var canvas = document.createElement('canvas');
    canvas.width = 800;
    canvas.height = 800; //nameTable.offsetHeight + 250;
    var ctx = canvas.getContext('2d');
    ctx.fillStyle = 'white';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Add header
    ctx.font = 'bold 30px Arial';
    ctx.fillStyle = 'black';
    ctx.textAlign = 'center';
    ctx.fillText('What\'s your VARIETY gamer score?', canvas.width / 2, 40);

    // Add score counter
    var names = document.getElementsByName('name[]');
    var num_names = names.length;
    var num_checked = 0;
    for (var i = 0; i < num_names; i++) {
        if (names[i].checked) {
            num_checked++;
        }
    }
    ctx.font = 'bold 24px Arial';
    ctx.fillStyle = 'black';
    ctx.textAlign = 'center';
    ctx.fillText('My Score: ' + num_checked + '/100', canvas.width / 2, 80);

    // Add columns
    ctx.font = 'bold 16px Arial';
    ctx.fillStyle = 'black';
    ctx.textAlign = 'left';
    var column_width = (canvas.width - 20) / 4;
    var x = 10;
    var y = 100;
    var names_per_column = Math.ceil(num_names / 4);
    for (var col = 0; col < 4; col++) {
        for (var row = 0; row < names_per_column; row++) {
            var name_index = col * names_per_column + row;
            if (name_index >= num_names) {
                break;
            }
            var name = names[name_index].value;
            if (name.length > 25) {
                name = name.substring(0, 25) + '...';
            }
            if (names[name_index].checked) {
                ctx.fillStyle = 'black';
            } else {
                ctx.fillStyle = '#BBB'; // lighter color for unselected games
            }
            ctx.fillText(name, x + 10, y + 20);
            y += 25;
        }
        x += column_width + 5;
        y = 100;
    }
    // Add footer text
    ctx.fillStyle = 'black';
    ctx.font = 'bold 18px Arial';
    ctx.textAlign = 'center';
    ctx.fillText('https://fun.pcgamers.win', canvas.width / 2, canvas.height - 20);

// Generate a random name for the file
var randomName = Math.random().toString(36).substring(7) + '.jpg';

// Create a new image element
var img = document.createElement('img');

// Set the image source to the data URL
img.src = canvas.toDataURL('image/jpeg', 0.9);

// Set the image to display as a block and center it
img.style.display = 'block';
img.style.margin = '0 auto';

// Set the max-width property to 100% to make the image responsive
img.style.maxWidth = '100%';

// Remove all existing elements from the body
document.body.innerHTML = '';

// Add the image element to the body
document.body.appendChild(img);

// Create a download button
var downloadBtn = document.createElement('button');
downloadBtn.innerHTML = 'Download';
downloadBtn.style.marginRight = '10px';
downloadBtn.onclick = function() {
  var link = document.createElement('a');
  link.download = 'varietyScore_' + randomName;
  link.href = img.src;
  link.click();
};
document.body.appendChild(downloadBtn);

// Create a refresh button
var refreshBtn = document.createElement('button');
refreshBtn.innerHTML = 'Start Over';
refreshBtn.onclick = function() {
// Reload the page
  location.reload();
};
document.body.appendChild(refreshBtn);

// Center the buttons
var buttonsContainer = document.createElement('div');
buttonsContainer.style.textAlign = 'center';
buttonsContainer.appendChild(downloadBtn);
buttonsContainer.appendChild(refreshBtn);
document.body.appendChild(buttonsContainer);

}


</script>
</body>
</html>

