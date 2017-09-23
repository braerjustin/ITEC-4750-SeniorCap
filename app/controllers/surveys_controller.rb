class SurveysController < ApplicationController
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
    @survey = Survey.new
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


  private
  def survey_params
    params.require(:survey).permit(:user, :course, :questions)
  end
end
