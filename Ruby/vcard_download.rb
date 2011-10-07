	card = Vpim::Vcard::Maker.make2 do |maker|

	maker.add_name do |name|
	    name.given = @contact.fname
	    name.family = @contact.lname
	end

	if !@contact.mobile_phone.empty?
		maker.add_tel(@contact.mobile_phone) do |tel|
			tel.location = 'cell'
			tel.preferred = true
		end
	end
	if !@contact.office_phone.empty?
		maker.add_tel(@contact.office_phone) do |tel|
			tel.location = 'work'
			tel.preferred = false
		end
	end

	if !@contact.title.empty?
		maker.title = @contact.title
	end
	if !@contact.company.empty?
		maker.org = @contact.company
	end

	maker.add_addr do |addr|
		addr.location = 'work'
		addr.street = @contact.street
		addr.locality = @contact.city
		addr.region = @contact.state
		addr.postalcode = @contact.zip_code
		addr.country = 'United States'
	end

	if !@contact.fax.empty?
		maker.add_tel(@contact.fax) do |tel|
			tel.location = 'work'
			tel.capability = 'fax'
		end
	end
	if !@contact.email.empty?
		maker.add_email(@contact.email) do |e|
			e.location = 'home'
		end
	end

	if !@contact.second_email.empty?
		maker.add_email(@contact.office_email) do |e|
			e.location = 'work'
		end
	end

	end
	
	send_data card.to_s,
	:filename => 'contact.vcf'