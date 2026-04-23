<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>4.0 Tasker</title>
  <style>
    body {
      background-color: white; 
      margin: 0;
      overflow: hidden; 
    }
    .letter {
      position: absolute; 
      font-size: 32px;
      font-weight: normal; /* no bold */
      color: black; 
      letter-spacing: 10px; /* extra spacing between letters */
    }
  </style>
</head>
<body>
<?php
$name = "STEVENKANE PABELONA"; 
$letters = str_split($name);
foreach ($letters as $ch) {
    if ($ch !== " ") { 
        echo "<span class='letter'>$ch</span>";
    }
}
?>

<script>
  const letters = document.querySelectorAll(".letter");
  let angle = 0;
  let y = window.innerHeight;

  function animate() {
    y -= 2; // drift upward
    if (y < -200) {
      y = window.innerHeight; // reset to bottom
    }

    letters.forEach((letter, index) => {
      // Spiral math: angle + index offset
      const offsetAngle = angle + index * 0.5;
      const radius = 100; // distance from "pole"

      // Spiral coordinates around center
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius; // gives circular rotation

      // Position letters in spiral climbing upward
      letter.style.top = (y - index * 20) + "px"; 
      letter.style.left = (window.innerWidth / 2 + xOffset) + "px";

    });

    angle += 0.05; // rotate spiral
    requestAnimationFrame(animate);
  }

  animate();
</script>
</body>
</html>
