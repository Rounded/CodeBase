  def questionaire_thank_you(questionaire)
  	if !questionaire.email.empty?
  		mail(:to=>questionaire.email, :from=> questionaire.from_email, :subject => "Thank You For Your Feedback")
  	end
  end