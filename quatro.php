<?php
?>
<!DOCTYPE html>
<html>
<head>
  <title>4.0 Tasker Spiral</title>
  <style>
    body {
      background-color: white; 
      margin: 0;
      overflow: hidden; 
    }
    .letter {
      position: absolute; 
      font-size: 26px;   /* smaller, less bold */
      font-weight: normal; 
      color: black; 
      letter-spacing: 18px; /* more spacing between letters */
      transform-origin: center;
      transition: transform 0.2s ease; /* smooth tilt/scale */
    }
  </style>
</head>
<body>
<?php
// Each letter is its own instance
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
    y -= 2; // slower upward speed
    if (y < -800) {
      y = window.innerHeight; // reset to bottom
    }

    letters.forEach((letter, index) => {
      // Spiral math: helix around a pole
      const offsetAngle = angle + index * 0.5; 
      const radius = 160; // distance from pole

      // Circular coordinates
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius;

      // Position each letter independently in spiral
      const topPos = (y - index * 45);
      const leftPos = (window.innerWidth / 2 + xOffset);

      letter.style.top = topPos + "px"; 
      letter.style.left = leftPos + "px";

      // Depth illusion: subtle scaling (closer = bigger, farther = smaller)
      const scale = 0.85 + (zOffset / radius) * 0.15; 
      letter.style.transform = `scale(${scale})`;

      // Tilt when reaching left or right extremes
      if (xOffset > radius * 0.7) {
        letter.style.transform += " rotateY(15deg)"; // tilt right
      } else if (xOffset < -radius * 0.7) {
        letter.style.transform += " rotateY(-15deg)"; // tilt left
      }
    });

    angle += 0.07; // slower rotation for smoother spiral
    requestAnimationFrame(animate);
  }

  animate();
</script>
</body>
</html>
