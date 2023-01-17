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
        console.log(data.fields)
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
      } else {
        if (data.type === 1) {
          data.fields.forEach((field) => {
            $(`input[name="${field}"]`).addClass('error')
          })
        }
          let errorMessages = data.fields

          if (!errorMessages.includes('login')) {
            $('.login-warning').addClass('hidden')
          } else {
            $('.login-warning').removeClass('hidden').text('минимум 6 символов')
          }
          if (!errorMessages.includes('password')) {
            $('.password-warning').addClass('hidden')
          } else {
            $('.password-warning').removeClass('hidden').text('минимум 6 символов , обязательно должны состоять из цифр и букв')
          }
          if (!errorMessages.includes('confirm_password')) {
            $('.confirm-password-warning').addClass('hidden')
          } else {
            $('.confirm-password-warning').removeClass('hidden').text('пароли не совпадают')
          }
          if (!errorMessages.includes('email')) {
            $('.email-warning').addClass('hidden')
          } else {
            $('.email-warning').removeClass('hidden').text('введите валидный email')
          }
          if (!errorMessages.includes('name')) {
            $('.name-warning').addClass('hidden')
          } else {
            $('.name-warning').removeClass('hidden').text('минимум 2 символа , только буквы')
          }
      }
    }
  })
})