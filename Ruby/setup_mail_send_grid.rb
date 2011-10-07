ActionMailer::Base.smtp_settings = {
  :user_name => "app1122615@heroku.com",
  :password => "wrvwj4eh",
  :domain => "geneseegrande.com",
  :address => "smtp.sendgrid.net",
  :port => 587,
  :authentication => :plain,
  :enable_starttls_auto => true
}