# monurbox
Super, Simple, French Monitoring System
Copyright (c) 2017 by Corey Reichle
Licensed under the GPL vr 3 or later.

# What This Is (And, it's not really French)
It is pronounced either "mon-yur box" or "mon your box".  Your choice.  The former sounds kinda French, but it isn't.

It is, however, a super-simple monitoring system.  It can run remote checks, and can even run host-based checks, with no agent (unless you count ssh).

# How to use this

In it's most basic form, run ./monurbox, and it will run all checks, on all hosts.  You can optionally provide a hostname (As defined in ./hosts) and it will run all checks on the host, as defined.

You can also configure the checks to run independently, via cron, or whatever mechanism you'd like.  Just pass the hostname as the argument to the check.

Checks can also call plugins from ./plugins.  The are remote scripts that will run on the remote host, after logging in via ssh.

So, either:

./monurbox

or:

./monurbox example.com

The latter will run (as configured out of the box), a check to see if a webserver is answering with a 200 and telnet is listening (Well, filtered, per nmap) on example.com.  The former will run those checks, as well as check for a mis and a sshd process on 10.0.3.2, username 'ubuntu'.

There is an included index.php file, which will parse the script's output, and display it in a browser.  Rename it as you like.  It's compatible with any web server that can run php.

# To-Do
* Add a SQL Backend (SQLite, with optional MySQL).
* Add a web UI, basically a pretty looking version of monurbox's console output. (Done, sorta)
