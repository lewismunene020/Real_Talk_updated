# import  colorama
# from colorama import Fore

HEADER = '\033[95m'
OKBLUE = '\033[94m'
OKCYAN = '\033[96m'
OKGREEN = '\033[92m'
WARNING = '\033[93m'
FAIL = '\033[91m'
ENDC = '\033[0m'
BOLD = '\033[1m'
UNDERLINE = '\033[4m'

def printSuccess(data):
    print(BOLD+OKGREEN+str(data)+ENDC)


def printDanger(data):
    print(BOLD+FAIL+str(data)+ENDC)

# printSuccess("pull successful")