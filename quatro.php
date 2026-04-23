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
      letter-spacing: 8px; /* spacing between letters */
      transform-origin: center; /* allows flipping */
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
    y -= 6; // faster upward speed
    if (y < -400) {
      y = window.innerHeight; // reset to bottom
    }

    letters.forEach((letter, index) => {
      // Spiral math: helix around a tilted pole
      const offsetAngle = angle + index * 0.6; 
      const radius = 120; // distance from pole

      // Circular coordinates
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius;

      // Tilt the spiral slightly to the side
      const tilt = index * 2; 

      // Position letters in spiral climbing upward
      const topPos = (y - index * 30);
      const leftPos = (window.innerWidth / 2 + xOffset + tilt);

      letter.style.top = topPos + "px"; 
      letter.style.left = leftPos + "px";

      // Flip letters when they reach near the top
      if (topPos < 100) {
        letter.style.transform = "rotateY(180deg)";
      } else {
        letter.style.transform = "rotateY(0deg)";
      }
    });

    angle += 0.2; // faster rotation
    requestAnimationFrame(animate);
  }

  animate();
</script>
</body>
</html>
