class Survey < ApplicationRecord
  belongs_to :user
  has_many :questions
  belongs_to :course
  has_many :survey_responses
end
