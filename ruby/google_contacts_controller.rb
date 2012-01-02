class ContactsController < ApplicationController
	respond_to :html, :json

  def index
    respond_with(@contacts = Contact.all)
  end
  
  # def show
  #   @contact = Contact.find(params[:id])
	 #  respond_with(@contact)
  # end

  # def new
  #   @contact = Contact.new
		# respond_with(@contact)
  # end

  # def edit
  #   @contact = Contact.find(params[:id])
  # end

  # def feed
  # end

	def import
		redirect_to Google::Authorization.build_auth_url("http://localhost:3000/contacts/authorize")
	end

	def authorize
		token = Google::Authorization.exchange_singular_use_for_session_token(params[:token]) 

		unless token == false
			redirect_to "http://localhost:3000/contacts/results?token=#{token}"
		else
			flash[:error] = "Something went wrong while authorizing with google."
		end
	end

	def results
		@results = Google::Contact.all(params[:token])
    @contact = Contact.new
    @contact.contact_import(@results)
    redirect_to contacts_path
	end

  def create
    @contact = Contact.new(params[:contact])
    if @contact.save
      respond_with(@contact)
    else
      respond_with(@contact, :status => :unprocessable_entity)
    end
  end

  def update
    @contact = Contact.find(params[:id])
    if @contact.save
      respond_with(@contact)
    else
      respond_with(@contact, :status => :unprocessable_entity)
    end
  end

  def destroy
    @contact = Contact.find(params[:id])
    @contact.destroy
    respond_with(@contact)
  end



end
