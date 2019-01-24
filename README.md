Developed by Dev IL. Version : 1. 

# EULA
Is simple : 
* Don't do something illégal.
* I'm not responsible to what do you do. (i'm not your mother)

# How to start

* Download the zip
* Extract all files
* Modify param.json, change the value of EULA to true IF YOU ACCEPT THE TERMS OF USE

It's like that : 
```
"EULA" : false,
```
And need to be like that : 
```
"EULA" : true,
```

# How to use
### Setting
All parameter is in "param.json" :
```
{
	"EULA" : true,

	"max_file_size" : 104857600, /** Value in byte 
	* 1 Byte = 1 octet = 8 bits
	*
	* 1 Go = 1073741824 o
	* 1 Mo = 1048576 o
	* 1 Ko = 1024 o
	*/

	"access_mdp" : ["000e793db70c59309fa6f0f36d0046d110f3be3c"], /* in sha1 , not just "" or a space */
	"upload_mdp" : ["bb73aaafa1596e5425dc514a361ad4ef658f2758"], /* in sha1 , not just "" or a space */

	"ext_image" : ["png", "jpg", "jpeg", "gif"],
	"ext_audio" : ["wma", "wav", "ogg", "mp3"],
	"ext_video" : ["avi", "wmv", "mov", "webm", "mp4"],
	"ext_docum" : ["text", "txt", "pdf", "doc", "docx"]
}
```
Explication :
* ***max_file_size*** : Maximum size of the uploaded file
* ***access_mdp*** : Password allowed to access files (encrypted in php sha1)
* ***upload_mdp*** : Password allowed to upload files (encrypted in php sha1)
* ***ext_XXXXX*** : extension of which you consider as a XXXXX

# Coded in...
* **HTML**
* **CSS**
* **PHP**
* **Json**

My Twitter : [https://twitter.com/metalist_web]