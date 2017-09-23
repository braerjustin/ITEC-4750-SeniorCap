class User < ApplicationRecord
  has_many :surveys
  has_many :survey_responses

  validates :username, presence: true,
    uniqueness: true
  validates :password, presence: true,
    length: { minimum: 6 }
end
