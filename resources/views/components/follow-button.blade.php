<button class="btn btn-primary ml-4" id="followToggleBtn" onclick="followUser()"></button>

<script>
  let followStatus = '{{$follows}}';

  function followUser() {
    axios.post('/follow/{{$userid}}').then(response => {
      followStatus = !followStatus
      buttonText()
    }).catch(errors => {
      if (errors.response.status == 401) {
        window.location = '/login';
      }
    })
  }

  function buttonText() {
    const label = followStatus ? 'Unfollow' : 'Follow';
    document.getElementById('followToggleBtn').innerHTML = label;
  }

  buttonText();
</script>