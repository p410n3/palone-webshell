# palone-webshell
Selfmade PHP webshell. Nothing special but I just didnt like public ones I found.

# Why another webshell?

I wanted to play around with some vulnerabvle software on my server and all the webshells I found on github seemed fishy, bad or bloated as fuck, at least in my opinion. And when I dont find software that suits my taste I just make it my own. 

# Is this special?

You can use many ways to execute server commands instead of just one, didnt see that featue alot. Otherwise its nothubg special at all. I
It uses either:

- passthru 
- system 
- shell_exec 
- popen (live output!)
- exec 

Theres is also a shell_exec with a possible safe_mode bypass as mentioned [here](https://tools.cisco.com/security/center/viewAlert.x?alertId=11688)

If a server has blacklisted one but not the other, you can try multiple. 

# Thats it. Use ethical!
