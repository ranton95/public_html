The sessions file is basically a way to store the informations of the across the multiple pages for a single user. this is useful for storing the login information of the user during the different scenarios like login etc.

so when we start a session then the created unique session is then stored in the unique session id as a cookie on the users browser, this session id is then used to link the users browsers to their session data stored on the server.

Finallly the session is then destroyed using the session_destroy() which actually deletes all the session data,
