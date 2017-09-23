class SurveysController < ApplicationController

  #region pages

  def index
    unless (session[:user_id])
      redirect_to controller: 'login'
    end
    @current_user = User.find(session[:user_id])
  end

  def show
    unless (session[:user_id])
      redirect_to controller: 'login'
    end
    @survey = Survey.find(params[:id])
  end

  def new
    unless (session[:user_id])
      redirect_to controller: 'login'
    end
    @survey = Survey.new(survey_params)
  end

  def edit
    unless (session[:user_id])
      redirect_to controller: 'login'
    end
    @survey = Survey.find(params[:id])
    @current_user = User.find(session[:user_id])
    unless @current_user.surveys.include? @survey
      redirect_to action: 'index'
    end
  end

  #end pages

  #region CRUD

  def create
    @survey = Survey.new(survey_params)
    if @survey.save
      redirect_to @survey
    else
      render 'new'
    end
  end

  def update
    @survey = Survey.find(params[:id])
    if @survey.update(survey_params)
      redirect_to @survey
    else
      render 'edit'
    end
  end

  def destroy
    @survey = Survey.find(params[:id])
    @survey.destroy
    redirect_to action: 'index'
  end

  #end CRUD

  private
  def survey_params
    params.require(:survey).permit(:user, :course, :questions)
  end
end
