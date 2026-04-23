<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>4.0 Tasker Spiral Loop</title>
  <style>
    body {
      background-color: white; 
      margin: 0;
      overflow: hidden; 
    }
    .letter {
      position: absolute; 
      font-size: 24px;   /* less bold */
      font-weight: normal; 
      color: black; 
      letter-spacing: 20px; /* more spacing */
      transform-origin: center;
      transition: transform 0.15s ease;
    }
  </style>
</head>
<body>
<?php
$name = "STEVENKANE PABELONA"; 
$letters = str_split($name);
foreach ($letters as $index => $ch) {
    if ($ch !== " ") { 
        echo "<span class='letter' data-index='$index'>$ch</span>";
    }
}
?>

<script>
  const letters = document.querySelectorAll(".letter");
  let angle = 0;

  function animate() {
    letters.forEach((letter, index) => {
      const offsetAngle = angle + index * 0.8; 
      const radius = 180;

      // Spiral coordinates
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius;

      // Each letter has its own vertical position
      let topPos = parseFloat(letter.dataset.top || window.innerHeight) - 4; // faster upward speed
      if (topPos < -100) {
        topPos = window.innerHeight; // reset this letter individually
      }
      letter.dataset.top = topPos; // store position

      const leftPos = (window.innerWidth / 2 + xOffset);

      letter.style.top = topPos + "px"; 
      letter.style.left = leftPos + "px";

      // Depth illusion: subtle scaling
      const scale = 0.9 + (zOffset / radius) * 0.1; 
      letter.style.transform = `scale(${scale})`;

      // Tilt when reaching left or right extremes
      if (xOffset > radius * 0.7) {
        letter.style.transform += " rotateY(20deg)";
      } else if (xOffset < -radius * 0.7) {
        letter.style.transform += " rotateY(-20deg)";
      }
    });

    angle += 0.15; // rotation speed
    requestAnimationFrame(animate);
  }

  // Initialize each letter’s starting vertical position
  letters.forEach((letter, index) => {
    letter.dataset.top = window.innerHeight - index * 50;
  });

  animate();
</script>
</body>
</html>
