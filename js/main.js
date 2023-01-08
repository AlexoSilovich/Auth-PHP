// Auth

$('.signin-btn').click((e) => {
  e.preventDefault()

  $('input').removeClass('error')
  
  const login = $('input[name="login"]').val()
  const password = $('input[name="password"]').val()

  $.ajax({
    url: 'inc/signin.php',
    type: 'POST',
    dataType: 'json',
    data: {
      login,
      password
    },
    success: function(data) {
      if (data.status) {
        document.location.href = '/profile.php'
      } else {
        if (data.type === 1) {
          data.fields.forEach((field) => {
            $(`input[name="${field}"]`).addClass('error')
          })
        }
        $('.warning').removeClass('hidden').text(data.message)
      }
    }
  })

})

// Register

$('.reg-btn').click((e) => {
  e.preventDefault()

  $('input').removeClass('error')
  
  const login = $('input[name="login"]').val()
  const password = $('input[name="password"]').val()
  const confirmPassword = $('input[name="confirm_password"]').val()
  const email = $('input[name="email"]').val()
  const name = $('input[name="name"]').val()

  $.ajax({
    url: 'inc/signup.php',
    type: 'POST',
    dataType: 'json',
    data: {
      login,
      password,
      confirm_password: confirmPassword,
      email,
      name
    },
    success: function(data) {
      if (data.status) {
        document.location.href = 'index.php'
        console.log(data.status)
      } else {
        if (data.type === 1) {
          data.fields.forEach((field) => {
            $(`input[name="${field}"]`).addClass('error')
          })
        }
        $('.warning').removeClass('hidden').text(data.message)
      }
    }
  })
})