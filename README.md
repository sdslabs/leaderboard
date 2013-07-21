Leaderboard
===========

Leaderboard is a social application that keeps track of a user's score across
various websites. All data is easily viewed in a tabular format for all users
across the app. Leaderboard updates itself with the latest data as well.

#Services

Leaderboard tracks a user's score across various services: 

- ✓ Github (follower count)
- ✓ Last.FM (listen count)
- ✓ Stackoverflow (reputation)
- ✓ AskUbuntu (reputation)
- ✓ Facebook (subscribers)
- Dropbox (total space)
- ✓ Twitter (follower count)
- ✓ Spoj (current score)
- ✓ Gitscore (user's score)
- ✓ Hacker News (user's karma)
- ✓ Klout score
- ✓ Project Euler (problems solved)

More services are planned. Services that require authentication ask for a minimal
authentication via oauth.

#Authentication
The authentication mechanism for a user is based on Github's organization

#Screenshots
![Home Page](http://i.imgur.com/rePWIxK.png "Home Page")

![Accounts Page](http://i.imgur.com/WtC7K9R.png "accounts page")

##Credits
- thenounproject.com for the favicon
- We use [dapper](http://open.dapper.net) for scraping some data
- [Limonade](https://github.com/sofadesign/limonade) as the framework
