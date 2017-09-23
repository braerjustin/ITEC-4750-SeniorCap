Rails.application.routes.draw do
  resources :surveys do
    resources :questions do
      resources :choices
    end
  end
  resources :users
end
