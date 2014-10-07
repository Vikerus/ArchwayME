ArchwayME
=========

  Anyone wishing to contribute to this project is encouraged to contact me with ideas, concerns, or questions.
Many features which can be found in the source are not to be used in a production senario and as such are not representative of the main intent of this program.

  In short ArchwayME is a social platform to be used as a service. Being open source and free. I the creator believe in freedom of information. Together we the users and developers of the web should be able to make a pretty secure social platform upon which to communicate or develop further on.

Goals
=========

-Security is the top priority.
-Encryption of all data sets.
-Minimization of collected data.
-Simple messaging.
-Simple image uploading.
-Discrete profile page.
-Flexible and secure bulletin board.
-User friendly interface.
-Scalablity in relation to performance.
-RSS feed for personal user pages.

The Idea and Function
=========
  This social platform works a little like a phone book. The idea is to offer a private form of social networking. Other sites do their best to create a platform where you are incentivised to share more and more about yourself in an open way. This is a great way to create a social web of influence but comes at the price of privacy. Where one might find it as a fun way of expression the other side is someone sees it as an easy way to create a profile of who "you" are with relative ease. The idea is to facilitate communication instead of social advertisment. But for those who do wish to share a bit about who they are a profile can be created and made public or private. A simple blog entry of 1600 characters is allowed to be saved for others someone might know to read. Eventually a profile image will be allowed and possibly more. There will be no search function provided for browsing people signed up. 

  Rather a function of groups will act as hubs for people with common interests/friends. A group can be public or private. Public groups will show up in a list which a person can join to meet others with similar interests. Optionally a user will beable to encrypt their Handle in a group so that one can remain cloaked but still a part. Private groups will be invite only and won't be advertised to the public user base. Also people who are in public groups will have an option of whether to make that information available to friends on their profiles. Groups will have private bulletins which only the people joined to them can see. By default all users will have access to the main bulletin of the site.
  
  Each user will have a personalized page. On this page there will be a summary of information being queried. A layout of actions/modules to use. These include: Sending encrypted emails, Uploading images, Decrypting messages, Sending messages to friends, Setting your blog entry, Searching a Handles friendcode, Browsing the public groups, Viewing a personalized RSS feed, and Submitting something to the site's or a groups bulletin. More are sure to come but for now this is a fair bit. Every user will also as already stated have the option to create a personalized public profile page. On this page a user's Blog post will show and anything else which might be wanted to share. Images, RSS feeds, Groups, and more. Possibly even an open chat box which anyone could get to know the person on before sharing handles. A profile would be given a random hash or custom name which a user could define. 

  First to make contact with someone you must know their "Handle" a simple pseudo identity which is only known to those who would actually come to know "you." Each user is given a large id called a "FriendCode." This is very similar to the system that 3DS's use but more user friendly as you will be looking people up with a Handle and not a set of numbers. The set of numbers(friendcode) is used to make the storage of messages a tad bit more private if someone would ever retrieve said database. While allowing messages to be queried for by their owner. 
  The user profile is stored in the "User" database(to be totally encrypted) seperate from the "messages" database. Each user upon signing up is given a "wallet" to store points, a "friendcode" for communication, a "handle" to identify with, the email is stored to serve as part of the login process, and a 1600 character blog entry as "slate."

ToDo
=========

  Implement a more efficient database scheme for message storage. The current idea is to create a table for each user to store the messages instead of a bulk storage of all the messages in a single table.
  
  Create the group function so users can create and join a group then post within the private bulletin. Make a user's Handle encrypted upon request within a group. 
  
  Make friendcodes encryptable with a passphrase so that if a Handle is found a person can remain private and then share the passcode with only real contacts to reestablish contact.
  
  Encode and encrypt the user database values: email, handle, friendcode, and slate.
  
  Encode and encrypt messages stored within the message database.
  
  Fix all sql queries so they are secure and not hardcoded.
  
  Create functions for encrypting and decrypting within the functions page or called by the functions page.
  
  Build a simple and effective profile page with fully modular display options such as: RSS feed, Groups, Shout box, Blog space, Avatar, and Image gallery.
  
  Create a function for users to define their own profile url tag.
  
  Overhaul the css for the entire site to be mobile friendly. Starting with the login/home page.
  

Background
=========

My background: I am self taught in php. This means that methods used in the scripts will be rudimentary and possibly redundant. Much of what is in the original source was created as I learned. 

  Facebook is simply too intrusive. While it is a great way to "network" it is quickly becoming a horrible place to be "social." It is my hope that this simple and private system for social interation will become wide spread and trustworthy. 
