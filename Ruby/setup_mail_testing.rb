ActionMailer::Base.smtp_settings = {
  :address              => "smtp.gmail.com",
  :port                 => 587,
  :domain               => "railscasts.com",
  :user_name            => "ecandino@gmail.com",
  :password             => "Bills$35",
  :authentication       => "plain",
  :enable_starttls_auto => true
}