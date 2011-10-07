          <%= f.fields_for :video do |video| %>
            <%= video.label :youtube_username %><br>
            <%= video.text_field :youtube_username %>
          <% end %>