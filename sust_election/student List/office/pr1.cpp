#include<stdio.h>
#include<conio.h>


typedef struct
{
	int x,y;
}state;

int ca,cb,fa,fb,count = 0;
int track[10][10];
state p[100];

void print(int l)
{

	for(int i=0;i<l;i++)
		printf("%d %d::",p[i].x,p[i].y);


	return;

}

void dfs(state s, int i)
{
	p[i] = s;
	state temp;

	if(s.x==fa && s.y==fb)
	{
		 count++;
		 printf("solution %d: ",count);
		 print(i);
		 printf("\n");
		 return;
	}



	//empty a
	if(s.x>0)
	{
		temp = s;
		temp.x=0;
		if(track[temp.x][temp.y]==0)
		{
			track[temp.x][temp.y] = 1;
			p[i] = temp;
			dfs(temp,i+1);
			track[temp.x][temp.y] = 0;
		}
		temp = s;

	}


	//fill a
	if(s.x<ca)
	{
		temp = s;
		temp.x = ca;
		if(track[temp.x][temp.y]==0)
		{
			track[temp.x][temp.y] = 1;
			p[i] = temp;
			dfs(temp,i+1);
			track[temp.x][temp.y] = 0;
		}
		temp = s;
	}

	//empty b
	if(s.y>0)
	{
		temp = s;
		temp.y=0;
		if(track[temp.x][temp.y]==0)
		{
			track[temp.x][temp.y] = 1;
			p[i] = temp;
			dfs(temp,i+1);
			track[temp.x][temp.y] = 0;
		}
		temp = s;

	}


	//fill b
	if(s.y<cb)
	{
		temp = s;
		temp.y = cb;
		if(track[temp.x][temp.y]==0)
		{
			track[temp.x][temp.y] = 1;
			p[i] = temp;
			dfs(temp,i+1);
			track[temp.x][temp.y] = 0;
		}
		temp = s;
	}

	//a to b
	if(s.y<cb)
	{
		temp = s;
		int tt = cb-temp.y;
		if(tt>temp.x)
		{
			tt = temp.x;
		}
		temp.y += tt;
		temp.x -= tt;

		if(track[temp.x][temp.y]==0)
		{
			track[temp.x][temp.y] = 1;
			p[i] = temp;
			dfs(temp,i+1);
			track[temp.x][temp.y] = 0;
		}
		temp = s;
	}

	//b to a
	if(s.x<ca)
	{
		temp = s;
		int tt = ca-temp.x;
		if(tt>temp.y)
		{
			tt = temp.y;
		}
		temp.x += tt;
		temp.y -= tt;

		if(track[temp.x][temp.y]==0)
		{
			track[temp.x][temp.y] = 1;
			p[i] = temp;
			dfs(temp,i+1);
			track[temp.x][temp.y] = 0;
		}
		temp = s;
	}

}

int main()
{
	state s;
   for (int i=0;i<10;i++)
      for (int j=0;j<10;j++)
         track[i][j]=0;

	scanf("%d%d%d%d",&ca,&cb,&fa,&fb);
	s.x = 0,s.y = 0;

	track[0][0] = 1;
	dfs(s,0);
   //int te;
   //scanf("%d",te);
   getch();
	return 0;
}