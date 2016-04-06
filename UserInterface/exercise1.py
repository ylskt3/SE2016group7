try:
    inp = raw_input("Enter Hours: ")
    hours = float(inp)
    inp = raw_input("Enter Rate: ")
    rate = float(inp)
except:
    print "Error, please enter numeric input"
    quit()

def computepay(hours,rate):
    if hours <= 40:
    	pay = rate * hours
    else:
    	pay = rate * 40 + (rate * 1.5 * (hours - 40))
    return pay

pay = computepay(hours, rate)
print "Pay:", pay