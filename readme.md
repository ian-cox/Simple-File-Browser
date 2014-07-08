# Simple File Browser v0.1

**Still in the very early stages of development**

The intent of this project is to create a simple responsive file browser to view and manage randomly uploaded content.

[Monosnap](http://monosnap.com/) allows me to quickly upload and share files and screen shots via my FTP client.

---

### The .htaccess file re-routs files through display.php to make nice previews

A file located here:
```
	domain.com/files/file.jpg
```

Can be previewed here:
```
	domain.com/a/file.jpg	
```

Monosnap allows you to specify the upload folder:
```
	/domain.com/files/
```

Monosnap also allows you to specify a base URL:
```
	http://domain.com/a
```

After the file is uploaded, Monosnap copies the baseurl+file to your clipboard for easy sharing.

---

### Features
- Displays all files in "files" directory
- Auto Generates thumbnails for images
- Auto Generates thumbnails for fonts
- Directory Navigation with AJAX


