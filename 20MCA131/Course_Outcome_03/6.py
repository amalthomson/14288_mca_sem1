l=int(input("enter the lower limit\t"))
u=int(input("enter the higher limit\t"))
lst=[x for x in range(l,u+1) if x**.5== int(x**.5)]
lst=[x for x in lst if x%2==0 ]
print(lst)