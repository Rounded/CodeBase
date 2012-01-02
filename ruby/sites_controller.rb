class SitesController < ApplicationController
before_filter :authenticate_user!, :except => [:show]
respond_to :html, :json

  def index
    @sites = Site.all
    respond_with(@sites)
  end
  
  def show
    @site = Site.find(params[:id])
	  respond_with(@site) do |format|
	    format.html { render :layout =>"mobile"}
	    format.json
	  end
  end

  def new
    @site = Site.new
    @site.photos.build
		respond_with(@site)
  end

  def edit
    @site = Site.find(params[:id])
    respond_with(@site)
  end

  def create
    @site = Site.new(params[:site])

    if @site.save  
      flash[:notice] = "Successfully created site."  
    end  
    respond_with(@site)
  end

  def update
    @site = Site.find(params[:id])

    if @site.update_attributes(params[:site])  
      flash[:notice] = "Successfully updated site."  
    end  
    respond_with(@site)
  end

  def destroy
    @site = Site.find(params[:id])
    @site.destroy
    respond_with(@site)
  end
end
