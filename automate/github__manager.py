
import  os
from automate import color__manager as cm

cm.printSuccess("Someone commited to your appprobably  you")


os.system( 'eval "$(ssh-agent -s)"')
os.system("ssh-add ~/.ssh/githubssh")
command =  'git  pull  origin master'
os.system(command)
# print(cmd.processData(command))
# output  = cmd.processData(command)
# os.system('./pullGit')

cm.printSuccess("Someone commited to your appprobably  you")
