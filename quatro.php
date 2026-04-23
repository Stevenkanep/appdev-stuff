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
      letter-spacing: 12px; /* more spacing between letters */
      transform-origin: center;
      transition: transform 0.1s linear; /* smooth scaling/rotation */
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
    y -= 3; // slower upward speed
    if (y < -400) {
      y = window.innerHeight; // reset to bottom
    }

    letters.forEach((letter, index) => {
      // Spiral math: helix around a pole
      const offsetAngle = angle + index * 0.6; 
      const radius = 150; // distance from pole

      // Circular coordinates
      const xOffset = Math.cos(offsetAngle) * radius;
      const zOffset = Math.sin(offsetAngle) * radius;

      // Position letters in spiral climbing upward
      const topPos = (y - index * 35);
      const leftPos = (window.innerWidth / 2 + xOffset);

      letter.style.top = topPos + "px"; 
      letter.style.left = leftPos + "px";

      // Scale letters to simulate depth (closer = bigger, farther = smaller)
      const scale = 0.5 + (zOffset / radius + 0.5); 
      letter.style.transform = `scale(${scale})`;

      // Flip letters when they reach near the top
      if (topPos < 120) {
        letter.style.transform += " rotateY(180deg)";
      }
    });

    angle += 0.08; // slower rotation for smoother spiral
    requestAnimationFrame(animate);
  }

  animate();
</script>
</body>
</html>
