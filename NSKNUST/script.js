document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('summarize-btn').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent form submission
  
      var url = document.getElementById('url').value.trim();
  
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'your-server-side-script.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          document.getElementById('title').value = response.title;
          document.getElementById('author').value = response.author;
          document.getElementById('publication').value = response.publication_date;
          document.getElementById('summary').value = response.summary;
          document.getElementById('sentiment').value = response.sentiment;
        } else {
          console.error('Error:', xhr.statusText);
        }
      };
      xhr.send('url=' + encodeURIComponent(url));
    });
  });
  