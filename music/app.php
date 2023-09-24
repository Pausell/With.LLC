<?php
require_once 'config.php';

// Check if the 'music' table exists
$table_check_query = "SHOW TABLES LIKE 'music'";
$result = $db->query($table_check_query);

if ($result->num_rows == 0) {
    // If the 'music' table does not exist, create it
    $table_create_query = "CREATE TABLE music (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL UNIQUE,
        description VARCHAR(255) NOT NULL,
        playlist VARCHAR(255) NOT NULL,
        genre VARCHAR(255) NOT NULL,
        artist VARCHAR(255) NOT NULL,
        album VARCHAR(255) NOT NULL,
        lyrics TEXT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    if ($db->query($table_create_query) !== TRUE) {
        die("Error creating table: " . $db->error);
    }
}

// Add music items to the 'music' table
$musicItems = array(
    array(
        'title' => 'Blessed Be Your Name',
        'description' => 'Label: Sparrow. Released: 2004.',
        'playlist' => 'Modern Rock',
        'genre' => 'Rock',
        'artist' => 'Matt Redman, Beth Redman',
        'album' => 'He Reigns, Devotion',
        'lyrics' => <<<TEXT
[Verse 1]<br/>
Blessed be Your Name<br/>
In the land that is plentiful<br/>
Where Your streams of abundance flow:<br/>
Blessed be Your Name!<br/>
<br/>
Blessed be Your Name,<br/>
When I'm found in the desert place<br/>
Though I walk through the wilderness:<br/>
Blessed be Your Name<br/>
<br/>
[Chorus]<br/>
Every blessing You pour out<br/>
I'll turn back to praise!<br/>
When the darkness closes in Lord,<br/>
Still I will say,<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your Name!<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your glorious Name!<br/>
<br/>
[Verse 2]<br/>
Blessed be Your Name<br/>
When the sun's shining down on me<br/>
When the world's "all as it should be"<br/>
Blessed be Your Name!<br/>
<br/>
Blessed be Your Name,<br/>
On the road marked with suffering<br/>
Though there's pain in the offering:<br/>
Blessed be Your Name<br/>
<br/>
[Chorus]<br/>
Every blessing You pour out<br/>
I'll turn back to praise!<br/>
When the darkness closes in Lord,<br/>
Still I will say,<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your Name!<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your glorious Name!<br/>
<br/>
[Bridge]<br/>
You give and take away,<br/>
You give and take away<br/>
My heart will choose to say Lord,<br/>
Blessed be Your Name!<br/>
<br/>
You give and take away,<br/>
You give and take away<br/>
My heart will choose to say<br/>
Lord, blessed be Your Name!<br/>
<br/>
[Verse 4]<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your Name!<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your glorious Name!<br/>
<br/>
Blessed be the Name of the Lord,<br/>
Blessed be Your Name!<br/>
Blessed be the Name of the Lord:<br/>
Blessed be Your glorious Name!<br/>
TEXT
    ),
    array(
        'title' => 'Come Thou Fount of Every Blessing',
        'description' => 'Label: Rocketown Records. Released: 2001.',
        'playlist' => 'Sing!',
        'genre' => 'Classical',
        'artist' => 'Chris Rice',
        'album' => 'The Living Room Sessions (Studio Album)',
        'lyrics' => <<<TEXT
[Verse 1]<br/>
Come Thou fount of every blessing<br/>
Tune my heart to sing Thy grace<br/>
Streams of mercy never ceasing<br/><br/>
Call for songs of loudest praise<br/>
Teach me some melodious sonnet<br/>
Sung by flaming tongues above<br/>
Praise the mount, I'm fixed upon it<br/>
Mount of Thy redeeming love<br/>
<br/>
[Verse 2]<br/>
Here I raise my Ebenezer<br/>
Here by Thy great help I've come<br/>
And I hope by Thy good pleasure<br/>
Safely to arrive at home<br/>
Jesus sought me when a stranger<br/>
Wandering from the fold of God<br/>
Here to rescue me from danger<br/>
Interposed His precious blood<br/>
(Precious blood)<br/>
<br/>
[Verse 3]<br/>
Oh, that day when freed from sinning<br/>
I shall see Thy lovely face<br/>
Clothe it then in blood washed linen<br/>
How I'll sing Thy sovereign grace<br/>
Come my Lord, no longer tarry<br/>
Take my ransom soul away<br/>
Send Thine angels now to carry<br/>
Me to realms of endless days<br/>
<br/>
[Verse 4]<br/>
Oh, to grace how great a debtor<br/>
Daily I'm constraint to be<br/>
Let Thy goodness like a fetter<br/>
Bind my wandering heart to Thee<br/>
Prone to wander, Lord I feel it<br/>
Prone to leave the God I love<br/>
Here's my heart, oh take and seal it<br/>
Seal it for Thy courts above<br/>
<br/>
[Outro]<br/>
Here's my heart, oh, take and seal it<br/>
Seal it for Thy courts above<br/>
TEXT
    ),
    array(
        'title' => 'I Need Thee Every Hour',
        'description' => 'Sing!',
        'playlist' => 'Classic Hymnals',
        'genre' => 'Hymn, Bluegrass, Gospel',
        'artist' => 'Annie Hawks',
        'album' => '',
        'lyrics' => <<<TEXT
[Verse 1]<br/>
I need Thee every hour,<br/>
Most gracious Lord<br/>
No tender voice like Thine<br/>
Can peace afford<br/>
<br/>
[Chorus]<br/>
I need Thee, O I need Thee,<br/>
Every hour I need Thee!<br/>
O bless me now, my Savior,<br/>
I come to Thee!<br/>
<br/>
[Verse 2]<br/>
I need Thee every hour,<br/>
Stay Thou near by;<br/>
Temptations lose their power<br/>
When Thou art nigh.<br/>
<br/>
[Chorus]<br/>
I need Thee, O I need Thee,<br/>
Every hour I need Thee!<br/>
O bless me now, my Savior,<br/>
I come to Thee!<br/>
<br/>
[Verse 3]<br/>
I need Thee every hour,<br/>
In joy, or pain;<br/>
Come quickly and abide<br/>
Or life is vain.<br/>
<br/>
[Chorus]<br/>
I need Thee, O I need Thee,<br/>
Every hour I need Thee!<br/>
O bless me now, my Savior,<br/>
I come to Thee!<br/>
<br/>
[Verse 4]<br/>
I need Thee every hour,<br/>
Teach me Thy will;<br/>
Thy promises so rich<br/>
In me fulfill.<br/>
<br/>
[Chorus]<br/>
I need Thee, O I need Thee,<br/>
Every hour I need Thee!<br/>
O bless me now, my Savior,<br/>
I come to Thee!<br/>
<br/>
[Verse 5]<br/>
I need Thee every hour,<br/>
Most Holy One,<br/>
O make me Thine indeed,<br/>
Thou Blessed Son!<br/>
<br/>
[Chorus]<br/>
I need Thee, O I need Thee,<br/>
Every hour I need Thee!<br/>
O bless me now, my Savior,<br/>
I come to Thee!<br/>
TEXT
    ),
    array(
        'title' => 'Lord here\'s my basket',
        'description' => '',
        'playlist' => 'Classic Hymnals',
        'genre' => 'Hymn',
        'artist' => 'Victorious Valley Girls Home',
        'album' => '',
        'lyrics' => <<<TEXT
<br/><br/><a href="https://youtu.be/H-mfpg_0KRs" target="_blank">YouTube Video</a><br/>
<br/>
[Verse 1]<br/>
A multitude had gathered on a hill near Galilee<br/>
To hear the words of Jesus and His Miracles to see,<br/>
But as the day wore on His disciples came to say<br/>
"There's not enough to feed them Lord would you <span style="opacity:.85">(should we)</span> send them away",<br/>
But from a little boy's basket of five barley loaves of bread<br/>
And with two fish five thousand hungry people would be fed.<br/>
<br/>
[Chorus]<br/>
Lord here's my basket, It's not much I know,<br/>
But take it and use it, Please don't refuse it<br/>
Maybe it will grow.<br/>
Although I could keep it I'll give it to you.<br/>
So Lord here's my basket you don't have to ask it's the least I can <span style="opacity:.85">(could)</span> do.<br/>
<br/>
[Verse 2]<br/>
In each and every life there's a basket filled with <span style="opacity:.85">(full of)</span> goods.<br/>
Although it many not be used exactly as it should.<br/>
So many throw it all away or keep for themselves<br/>
While others they never use it, they just place it on a shelf.<br/>
Lord, I know that what you've done for me my basket can't repay.<br/>
But maybe with it you could feed some hungry soul along the way.<br/>
<br/>
[Chorus]<br/>
Lord Here's my basket, it's not much I know,<br/>
But take it and use it, please don't refuse it<br/>
Maybe it will grow.<br/>
Although I could keep it I'll give it to you.<br/>
So Lord here's my basket you don't have to ask it's the least I can do.<br/>
<br/>
[Outro]<br/>
So Lord here's my basket you don't have to ask it's the least I can do.<br/>
</span><br/>
<br/><br/>
<span>
<ul>
<li><a target="_blank" style="text-decoration:underline" href="https://www.youtube.com/watch?v=H-mfpg_0KRs">YouTube Video</a></li>
</ul><br/>
TEXT
    ),
    array(
        'title' => 'Saved by the blood of the Crucified One!',
        'description' => '',
        'playlist' => 'Classic Hymnals',
        'genre' => 'Hymn',
        'artist' => 'S. J. Henderson (1902)',
        'album' => '',
        'lyrics' => <<<TEXT
[Verse 1]<br/>
Saved by the blood of the Crucified One!<br/>
Now ransomed from sin and a new work begun,<br/>
Sing praise to the Father and praise to the Son,<br/>
Saved by the blood of the Crucified One!<br/>
<br/>
[Refrain]<br/>
Glory, I'm saved! glory, I'm saved!<br/>
My sins are all pardoned, my guilt is all gone!<br/>
Glory, I'm saved! Glory, I'm saved!<br/>
I'm saved by the blood of the Crucified One!<br/>
<br/>
[Verse 2]<br/>
Saved by the blood of the Crucified One!<br/>
The angels rejoicing because it is done;<br/>
A child of the Father, joint-heir with the Son,<br/>
Saved by the blood of the Crucified One! (Refrain)<br/>
<br/>
[Verse 3]<br/>
Saved by the blood of the Crucified One!<br/>
The Father He spake, and His will it was done;<br/>
Great price of my pardon, His own precious Son;<br/>
Saved by the blood of the Crucified One! (Refrain)<br/>
<br/>
[Verse 4]<br/>
Saved by the blood of the Crucified One!<br/>
All hail to the Father, all hail to the Son,<br/>
All hail to the Spirit, the great Three in One!<br/>
Saved by the blood of the Crucified One! (Refrain)<br/>
TEXT
    ),
    array(
        'title' => 'The Last Blood',
        'description' => 'Song Description 3',
        'playlist' => 'Classic Hymnals',
        'genre' => 'Hymn',
        'artist' => '',
        'album' => '',
        'lyrics' => <<<TEXT
[Verse 1]<br/>
When man sinned in the garden<br/>
That sin Jehovah could not condone<br/>
The blood shed of animals<br/>
Could not forever sin atone<br/>
<br/>
[Verse 2]<br/>
But the Son had compassion<br/>
He said Father I'll be your Lamb<br/>
So once again blood was shed<br/>
As the soldiers nailed His hands<br/>
<br/>
[Verse 3]<br/>
It's been three days since Heaven<br/>
Watched their Prince of Glory die<br/>
His followers are in mourning<br/>
For in the tomb their Saviour lies<br/>
<br/>
[Verse 4]<br/>
But at the grave something is happening<br/>
As death screams I've lost my hold<br/>
Angels rise in anticipation<br/>
For the Son is coming home<br/>
<br/>
[Chorus]<br/>
And there He comes<br/>
And He's got the blood<br/>
That He shed on Calvary<br/>
And the Father says<br/>
Well done my Son<br/>
This is the last blood I'll ever need<br/>
(Repeat Chorus)
</span>
<br/><br/>
<span>
<p style="color:red">Jesus shed His blood once and for all.</p><br/>
TEXT
    ),
    array(
        'title' => 'Welcome to the lake',
        'description' => 'Label: The Body Incorporated',
        'playlist' => 'Abandon Pain',
        'genre' => 'Rap, Hip-Hop',
        'artist' => 'ASAP Preach, An Example Now',
        'album' => 'New Season',
        'lyrics' => <<<TEXT
<br/><br/><a href="https://youtu.be/jQZC2M3aRz4">YouTube Video</a><br/>
<br/>
Man, nobody preachin' hell anymore<br/>
Instead, even some Christians are caught up in materialistic things<br/>
Still even in addiction<br/>
Not living as a new creation as He called us to be<br/>
<br/>
And still, people in the world are choosing to deny Jesus as the Son of God<br/>
Not facing the reality of "their consequences are gonna put them in hell<br/>
if they don't turn away from their sin<br/>
and put their trust in Him".<br/>
<br/>
Listen!<br/>
I'm gonna keep my hands clean for my family<br/>
it's not by sight by but faith<br/>
Yes I can see<br/>
God pulled me out of the dirt<br/>
Kinda like a sand flea<br/>
When the angels blow the trumpets<br/>
it's gonna sound just like a sand beam (sound just like a sand beam)<br/>
<br/>
When I hit these streets all these police trynna ban me<br/>
No chance? We gonna stop? NO!<br/>
Then it lands me in jail,<br/>
but it's hell where they really trynna dare me<br/>
Too hot down there, there's no air and you can't breathe (and you can't breathe)<br/>
<br/>
So think about it, I'll be servin' 'till the day He calls me (yeah!)<br/>
Shootin' scriptures like you spray a tommy (bbbrrraaaahh!)<br/>
ACTING ALL TOUGH: are you scared to die?<br/>
Not at all,<br/>
but when those killers come they're gonna chop your head off and kick it like a soccer ball<br/>
If you're sent to hell, He won't hear you when you're prayin'<br/>
Body engulfed in fire, flames, I ain't talkin' super saiyan (WOAH)<br/>
<br/>
I'm gonna tell the truth: you don't hear me when I say it?<br/>
BODY ENGULED IN FIRE: FLAMES; I AIN'T TALKIN' SUPER SAIYAN (NAHH)<br/>
<br/>
Hey, Welcome to the Lake<br/>
Where the flames never quench,<br/>
And the worm never dies and iniquity leaves a stench<br/>
A place that's been forbeared for the prideful one calls it "Prodem"<br/>
Hey, Satan and his angels will wake the day of the fallen.<br/>
<br/>
Hey, Welcome to the Lake, I promise you can't escape<br/>
where murderers filled with hate, from those who gave up their faith,<br/>
a place that's been forbeared for those who reject the gospel,<br/>
for some I know the outcome will be awful.<br/>
You sure that's what you want?<br/>
<br/>
You sure that's what you want?<br/>
You sure that's what you want?<br/>
You sure that's what you want?<br/>
You sure that's what you want?<br/>
You sure that's what you want?<br/>
<br/>
Listen,<br/>
I do it for the people calling for help.<br/>
Messed up, now they're stuck, and they're locked in a cell.<br/>
Do it for the Kingdom, you don't got to rebel,<br/>
You could add all the views, I don't want it all to myself<br/>
<br/>
Is that your Bible that I saw on the shelf?<br/>
You fall, we all do so don't crawl in a shell (look it up)<br/>
Look at Saul, now I'm Paul, and I'm called to be built "on the B".<br/>
<br/>
Got Jesus!<br/>
And no longer by myself in these streets (HOT)<br/>
Pretty steady being "beat it"<br/>
God let me in the ringer,<br/>
Throwing jabs at the devil:<br/>
he's already been defeated.<br/>
<br/>
I am strong, I am better.<br/>
Yes, I do believe in Jesus.<br/>
Devil's not on God's level.<br/>
Don't believe me? Go and read it.<br/>
<br/>
Staying humble on the right track<br/>
No hustlin' I'm done servin' Satan<br/>
Sayin' you gonna get your life back<br/>
Turn to Jesus and I promise He could get your life back.<br/>
<br/>
All you gotta do is believe and receive your sight back. (Woah)<br/>
<br/>
Hey, Welcome to the Lake<br/>
Where the flames never quench,<br/>
and the worm never dies, and iniquity leaves a stench<br/>
A place that's been forbeared, for the prideful one calls it "Prodem"<br/>
Hey, Satan and his angels will wake the day of the fallen.<br/>
<br/>
Hey, Welcome to the Lake<br/>
I promise you can't escape<br/>
Where murderers filled with hate, from those who gave up their faith<br/>
A place that's been forbeared, for those who reject the gospel,<br/>
for some I know the outcome will be awful!<br/>
You sure that's what you want?<br/>
<br/>
If anybody that's listening to this track<br/>
And you feel like this song's calling to you right now,<br/>
feel the Lord's calling to you...<br/>
Just say, "Father God, Lord I ain't where I'm supposed to be.<br/>
I've been living in sin, I haven't realized I didn't think things through.<br/>
I didn't realize I was a new creation, I thought I was just a better person when I came to you.<br/>
But You said all things are new,<br/>
and the past is the past.<br/>
Lord I'm gonna hold onto my crown of victory, and I ain't giving it away.<br/>
I choose today to serve you. In Jesus's name, amen!<br/>
TEXT
    ),
    array(
        'title' => 'I am Barabbas',
        'description' => 'Probably really old but modernized. Unable to find this specific choir version online.',
        'playlist' => 'Classic Hymnals',
        'genre' => 'Gospel, Hymn',
        'artist' => 'Unknown',
        'album' => '',
        'lyrics' => <<<TEXT
My crime has been commended<br/>
and my sentence carried out.<br/>
This day on earth would be my last<br/>
of that I had no doubt.<br/>
<br/>
But then the crowd called out my name,<br/>
and my captor set me free.<br/>
Who was this man to took my place,<br/>
and gave his life for me?<br/>
<br/>
I am Barabbas, you've heard my name.<br/>
And you may be surprised to find,<br/>
that our stories are the same:<br/>
<br/>
I was a criminal in chains,<br/>
but then Jesus took my place!<br/>
<br/>
I am barabbas, and I'll never be the same!<br/>
<br/>
I know that I'm not worthy<br/>
of the grace that I've received.<br/>
How blessed I was to hear God's call<br/>
in the hour I first believed...<br/>
<br/>
And now I can identify with the one who'd been set free.<br/>
<br/>
If he came my way, if he spoke today, this is what he'd say to me:<br/>
I am Barabbas, you've heard my pain<br/>
And you may be surprised to find,<br/>
that our stories are the same:<br/>
I was a criminal in chains, but then Jesus took my place!<br/>
I am Barabbas, and I'll never be the same!<br/>
<br/>
So Jesus Christ was crucified,<br/>
God's perfect holy lamb,<br/>
His sacrifice would pay the price<br/>
for every guilty man!<br/>
<br/>
I am Barabbas, you've heard my gain.<br/>
And you may be surprised to find,<br/>
that our stories are the same:<br/>
I was a criminal in chains, but then Jesus took my place!<br/>
 <br/>
I am Barabbas, and I'll never be the same!<br/>
Just like Barabbas, I'll never ever be the same!<br/>
<br/>
Jesus saves!<br/>
TEXT
    ),
    array(
        'title' => 'Live Out Loud',
        'description' => 'Track 1',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Imagine this: I get a phone call from Regis<br/>
He says, "Do you want to be a millionaire?"<br/>
They put me on the show and I win with two lifelines to spare<br/>
Now picture this... I act like nothin' ever happened<br/>
And carry all my money in a coffee can<br/>
Well, I've been given more than Regis ever gave away<br/>
I was a dead man who was called to come out of my grave<br/>
And I think it's time for makin' some noise<br/>
<br/>
Wake the neighbors, get the word out<br/>
Come on... crank up the music... climb a mountain and shout<br/>
This is life we've been given meant to be lived out<br/>
So la la la la live out loud, yeah<br/>
Live out loud, yeah, yeah<br/>
<br/>
Think about this... try to keep a bird from singing<br/>
After it's soared up in the sky<br/>
Give the sun a cloudless day and tell it not to shine<br/>
Now think about this... if we really have been given<br/>
The gift of a life that will never end<br/>
And if we have been filled with living hope we're gonna overflow<br/>
And if God's love is burning in our hearts we're gonna glow<br/>
There's just no way to keep it in<br/>
<br/>
Wake the neighbors, get the word out<br/>
Come on... crank up the music... climb a mountain and shout<br/>
This is life we've been given meant to be lived out<br/>
So la la la la live out loud, yeah<br/>
Live out loud, yeah, yeah<br/>
<br/>
Everybody<br/>
La la la... la la la la<br/>
La la la live out loud<br/>
I want to hear everybody sing<br/>
La la la... la la la la<br/>
La la la live out loud, loud loud<br/>
<br/>
Every corner of creation is a living declaration<br/>
Come join the song we were made to sing<br/>
Wake the neighbors, get the word out<br/>
Come on... crank up the music... climb a mountain and shout<br/>
This is life we've been given meant to be lived out<br/>
So la la la la live out loud, yeah<br/>
Live out loud, yeah, yeah<br/>
TEXT
    ),
    array(
        'title' => 'This Day',
        'description' => 'Track 2',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Yesterday the sky was bright and clear<br/>
I could see the sun and I could hear the song<br/>
Faith flowed like a river free and deep<br/>
And grace was not so hard to be believed<br/>
But that was yesterday<br/>
And what was close enough to touch<br/>
Now seems a world away<br/>
So what about this day<br/>
<br/>
This day all His mercies are new<br/>
This day every promise is true<br/>
Father, help me to believe<br/>
Give me faith I need to know You<br/>
And trust You this day<br/>
This day<br/>
<br/>
Who knows what tomorrow's light will bring<br/>
Tears to cry or maybe songs to sing out loud<br/>
But only God can see that far away<br/>
And He made us for living day by day<br/>
'Cause He wants us to see<br/>
That the God that He's been every day of history<br/>
Is who He is this day<br/>
<br/>
This day all His mercies are new<br/>
This day every promise is true<br/>
Father, help me to believe<br/>
Give me faith I need to know You<br/>
And trust You<br/>
<br/>
'Cause You are the same yesterday and today and forever<br/>
Through every season Your truth and Your grace never change<br/>
Oh, Lord, I do believe<br/>
That the God that You've been every day of history<br/>
Is who You are this day<br/>
<br/>
This day...This day<br/>
<br/>
This day Your mercies are new<br/>
This day Your promise is true<br/>
This day my hope is in You, Lord<br/>
This day<br/>
<br/>
This day all His mercies are new<br/>
This day every promise is true<br/>
Father, help me to believe<br/>
Give me faith I need to know You<br/>
And trust You this day<br/>
<br/>
I'm gonna trust you this day<br/>
Yeah Yeah<br/>
This Day<br/>
TEXT
    ),
    array(
        'title' => 'Jesus Is Life',
        'description' => 'Track 3',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Ladies and Gentleman, children of all ages<br/>
Anyone listening, I've got an announcement to make<br/>
There's been some confusion about a certain someone<br/>
A lot of discussion and a lot of debate<br/>
So if I may take just a moment to say who Jesus is to me<br/>
<br/>
Jesus is life, yeah, oh, oh, oh, oh<br/>
Jesus is life, yeah, oh, oh, oh,oh<br/>
The air I'm breathing<br/>
Why my heart is beating<br/>
Everything I'm needing<br/>
Jesus is life<br/>
Jesus is life<br/>
<br/>
Imagine the deepest sea without a drop of water<br/>
An infinite galaxy without even one single star<br/>
That's how I would be...so absolutely empty<br/>
Without Jesus' life in me there'd be no life at all<br/>
More than just a part, He's the very heart of everything I am<br/>
<br/>
Jesus is life, yeah, oh, oh, oh, oh<br/>
Jesus is life, yeah, oh, oh, oh, oh<br/>
The air I'm breathing<br/>
Why my heart is beating<br/>
Everything I'm needing<br/>
Jesus is life<br/>
Jesus is life<br/>
<br/>
This is my position concerning my condition<br/>
This is my position concerning my condition<br/>
This is my position my life by definition<br/>
<br/>
Jesus is life<br/>
Jesus is life<br/>
Jesus is life<br/>
Jesus is life<br/>
<br/>
Jesus is life, yeah, oh, oh, oh, oh<br/>
Jesus is life, yeah, oh, oh, oh, oh<br/>
The air I'm breathing<br/>
Why my heart is beating<br/>
Everything I'm needing<br/>
Jesus is life yeah, oh, oh, oh, oh<br/>
Jesus is life, yeah, oh, oh, oh, oh<br/>
The air I'm breathing<br/>
Why my heart is beating<br/>
Everything I'm needing<br/>
Jesus is life<br/>
Jesus is life<br/>
Jesus is life<br/>
Yes he is<br/>
Woo, yeaha<br/>
TEXT
    ),
    array(
        'title' => 'No Greater Love',
        'description' => 'Track 4',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Men of courage with your message of peace<br/>
What is that look in your eyes?<br/>
Why have you come to this faraway place?<br/>
What is this story you would lay down your live to tell?<br/>
What kind of love can this be?<br/>
<br/>
There is no greater love than this<br/>
There is no greater gift that can ever be given<br/>
To be willing to die so another might live<br/>
There is no greater love than this<br/>
<br/>
Broken hearted from all you have lost<br/>
How can you sing through your tears?<br/>
What is this music that can bear such a cost?<br/>
What is this fire that grows stronger against the wind?<br/>
What kind of flame can this be?<br/>
<br/>
There is no greater love than this<br/>
There is no greater gift that can ever be given<br/>
To be willing to die so another might live<br/>
There is no greater love than this<br/>
<br/>
This is the love God showed the world<br/>
When he gave us His Son<br/>
So we can know his love forever<br/>
Beyond the Gates of Splendor<br/>
<br/>
There is no greater love than this<br/>
There is no greater gift that can ever be given<br/>
To be willing to die so another might live<br/>
There is no greater love than this<br/>
TEXT
    ),
    array(
        'title' => 'God Is God',
        'description' => 'Track 5',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
And the pain falls like a curtain<br/>
On the things I once called certain<br/>
And I have to say the words I fear the most<br/>
I just don't know<br/>
<br/>
And the questions without answers<br/>
Come and paralyze the dancer<br/>
So I stand here on the stage afraid to move<br/>
Afraid to fall, oh, but fall I must<br/>
On this truth that my life has been formed from the dust<br/>
<br/>
God is God and I am not<br/>
I can only see a part of the picture He's painting<br/>
God is God and I am man<br/>
So I'll never understand it all<br/>
For only God is God<br/>
<br/>
And the sky begins to thunder<br/>
And I'm filled with awe and wonder<br/>
'Til the only burning question that remains<br/>
Is who am I<br/>
<br/>
Can I form a single mountain<br/>
Take the stars in hand and count them<br/>
Can I even take a breath without God giving it to me<br/>
He is first and last before all that has been<br/>
Beyond all that will pass<br/>
<br/>
God is God and I am not<br/>
I can only see a part of the picture He's painting<br/>
God is God and I am man<br/>
So I'll never understand it all<br/>
For only God is God<br/>
<br/>
Oh, how great are the riches of His wisdom and knowledge<br/>
How unsearchable for to Him and through Him and from Him are all things<br/>
<br/>
So let us worship before the throne<br/>
Of the One who is worthy of worship alone<br/>
<br/>
God is God and I am not<br/>
I can only see a part of the picture He's painting<br/>
God is God and I am man<br/>
So I'll never understand it all<br/>
For only God is God<br/>
TEXT
    ),
    array(
        'title' => 'See The Glory',
        'description' => 'Track 6',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
I never did like the word mediocre<br/>
I never wanted it to be said of me (Oh no)<br/>
Just point me to the top and I'd go over (over)<br/>
Looking for the very best that could be<br/>
<br/>
So<br/>
What is this thing I see<br/>
Going on inside of me<br/>
When it comes to the Grace of God<br/>
Sometimes it's like<br/>
<br/>
I'm playing GameBoy standing in the middle of the Grand Canyon<br/>
I'm eating candy sitting at a gourmet feast<br/>
I'm wading in a puddle when I could be swimming in the ocean<br/>
<br/>
Tell me what's the deal with me<br/>
Wake up and see the Glory<br/>
<br/>
Every star in the sky tells His story<br/>
And every breeze is singing His song<br/>
All of creation is imploring (hey)<br/>
Come see this grand phenomenon<br/>
<br/>
The wonder of His Grace<br/>
Should take my breath away<br/>
I miss so many things<br/>
When I'm content with<br/>
<br/>
I'm playing GameBoy standing in the middle of the Grand Canyon<br/>
I'm eating candy sitting at a gourmet feast<br/>
I'm wading in a puddle when I could be swimming in the ocean<br/>
<br/>
I know the time has come for me to<br/>
Wake up and see the Glory<br/>
<br/>
Wake up and see the Glory, yeah<br/>
(ba, ba, ba...)<br/>
How could I trivialize it<br/>
This awesome gift of God's Grace<br/>
Once I had come to realize it<br/>
I should be speechless and amazed<br/>
<br/>
(wake up)<br/>
<br/>
Wake up<br/>
Wake up and see the Glory<br/>
Open your eyes and take it in<br/>
Wake up and be amazed<br/>
Over and over again<br/>
Wake up<br/>
Wake up and see the Glory<br/>
Open your eyes and take it in<br/>
Wake up and be amazed<br/>
Over and over again<br/>
<br/>
God's Love is coming to you and to me<br/>
Wake up, wake up<br/>
Open your eyes, yeah<br/>
Over and over again<br/>
<br/>
Oh yeah<br/>
<br/>
Wake up, wake up, wake up<br/>
<br/>
Come on, take it in<br/>
TEXT
    ),
    array(
        'title' => 'Bring It On',
        'description' => 'Track 7',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
I didn't come lookin' for trouble<br/>
And I don't want to fight needlessly<br/>
But I'm not gonna hide in a bubble<br/>
If trouble comes for me<br/>
I can feel my heart beating faster<br/>
I can tell something's coming down<br/>
But if it's gonna make me grow stronger then<br/>
<br/>
Bring it on<br/>
Let the lightning flash, let the thunder roll, let the storm winds blow<br/>
Bring it on<br/>
Let the trouble come, let the hard rain fall, let it make me strong<br/>
Bring it on<br/>
<br/>
Now, maybe you're thinkin' I'm crazy<br/>
And maybe I need to explain some things<br/>
'Cause I know I've got an enemy waiting<br/>
Who wants to bring me pain<br/>
But what he never seems to remember<br/>
What he means for evil God works for good<br/>
So I will not retreat or surrender<br/>
<br/>
Bring it on<br/>
Let the lightning flash, let the thunder roll, let the storm winds blow<br/>
Bring it on<br/>
Let the trouble come, let the hard rain fall, let it make me strong<br/>
Bring it on<br/>
<br/>
Now, I don't want to sound like some hero<br/>
'Cause it's God alone that my hope is in<br/>
But I'm not gonna run from the very things<br/>
That would drive me closer to Him<br/>
So bring it on<br/>
<br/>
Bring it on<br/>
Let the lightning flash, let the thunder roll, let the storm winds blow<br/>
Bring it on<br/>
Let the trouble come, let it make me fall on the One who's strong<br/>
Bring it on<br/>
Let the lightning flash, let the thunder roll, let the storm winds blow<br/>
Bring it on<br/>
Let me be made weak so I'll know the strength of the One who's strong<br/>
Bring it on<br/>
Bring it on<br/>
TEXT
    ),
    array(
        'title' => 'When Love Takes You In',
        'description' => 'Track 8',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
I know you've heard the stories<br/>
But they all sound too good to be true<br/>
You've heard about a place called home<br/>
But there doesn't seem to be one for you<br/>
So one more night you cry yourself to sleep<br/>
And drift off to a distant dream<br/>
<br/>
Where love takes you in and everything changes<br/>
A miracle starts with the beat of a heart<br/>
When love takes you home and says you belong here<br/>
The loneliness ends and a new life begins<br/>
When love takes you in<br/>
<br/>
And somewhere while you're sleeping<br/>
Someone else is dreaming too<br/>
Counting down the days until<br/>
They hold you close and say I love you<br/>
And like the rain that falls into the sea<br/>
In a moment what has been is lost in what will be<br/>
<br/>
When love takes you in everything changes<br/>
A miracle starts with the beat of a heart<br/>
<br/>
And this love will never let you go<br/>
There is nothing that could ever cause this love to lose its hold<br/>
<br/>
When love takes you in everything changes<br/>
A miracle starts with the beat of a heart<br/>
When love takes you home and says you belong here<br/>
The loneliness ends and a new life begins<br/>
When love takes you in it takes you in for good<br/>
When love takes you in<br/>
TEXT
    ),
    array(
        'title' => 'Magnificent Obsession',
        'description' => 'Track 9',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Lord, You know how much I want to know so much<br/>
In the way of answers and explanations<br/>
I have cried and prayed and still I seem to stay<br/>
In the middle of life’s complications<br/>
<br/>
All this pursuing leaves me<br/>
Feeling like I’m chasing down the wind<br/>
But now it’s brought me back to You<br/>
And I can see again<br/>
<br/>
This is everything I want and this is everything I need<br/>
I want this to be my one consuming passion<br/>
Everything my heart desires, Lord I want it all to be for You<br/>
Jesus be my magnificent obsession<br/>
<br/>
Yeah, yeah, yeah<br/>
<br/>
So capture my heart again<br/>
Take me to depths I’ve never been<br/>
Into the riches of Your grace and Your mercy<br/>
Return me to the cross and let me be completely lost<br/>
In the wonder of the love that You’ve shown me<br/>
<br/>
Cut through these chains that tie me down<br/>
To so many lesser things<br/>
Let all my dreams fall to the ground<br/>
Until this one remains<br/>
<br/>
This is everything I want and this is everything I need<br/>
I want this to be my one consuming passion<br/>
Everything my heart desires, Lord I want it all to be for You<br/>
Jesus be my magnificent obsession, my magnificent obsession<br/>
<br/>
Yeah, yeah, yeah<br/>
<br/>
You are everything I want<br/>
And You are everything I need<br/>
Lord You are all my heart desires<br/>
You are everything to me<br/>
<br/>
You are everything I want, You are everything I need<br/>
I want You to be my one consuming passion<br/>
Everything my heart desires, Lord I want it all to be for You<br/>
I want it all to be for You<br/>
TEXT
    ),
    array(
        'title' => 'Declaration Of Dependence',
        'description' => 'Track 10',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Now just the other day I overheard a flower talking to the sky<br/>
He said you know that I would be nothing without You, oh, oh<br/>
He said you give me rain, you give the sun a place to shine<br/>
You're everything that my whole existence comes down to, oh, oh<br/>
And then the flower started singing a song<br/>
Before I knew it I was singing along<br/>
And we sang…<br/>
<br/>
This is my declaration of dependence<br/>
This is my declaration of my need<br/>
This is my declaration of dependence<br/>
On the one who gave His life to me<br/>
<br/>
Now, let me say that I'm the kind of guy who wants to do it all myself<br/>
Don't want to ask for help, don't like to stop for directions, oh, oh<br/>
But in reality I'm nothing on my own<br/>
It's by God's grace alone that I can make this confession<br/>
All that I am and all I'm hoping to be<br/>
Is all and only what He's given to me<br/>
So I say...<br/>
<br/>
And I know this is how my life was meant to be<br/>
I was made for this dependency<br/>
On the one who has created me<br/>
So I'll sing my declaration song<br/>
For the one I am depending on<br/>
And I hope you'll sing along<br/>
TEXT
    ),
    array(
        'title' => 'God Follower',
        'description' => 'Track 11',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
My heart is restless as I wander through this jungle<br/>
The trees above refuse to let the sunlight through<br/>
And somewhere deep inside I hear the whispered longings<br/>
That tell me I was made for more than this<br/>
<br/>
A blinding flash of light falls down into the darkness<br/>
Slowly I notice strange new markings on the trail<br/>
The crimson drops are calling out to me come and follow<br/>
"I am the God who made you, let Me show you how to live"<br/>
And I cry...<br/>
<br/>
I want to be a God follower<br/>
I want to go wherever He leads<br/>
I want to be a God follower<br/>
I want to walk the trail He's marked for me<br/>
And be a God follower<br/>
(More than anything)<br/>
<br/>
A now I journey on with the purpose and and with passion<br/>
Just like a dead man who's been given breath again<br/>
And though this path can still grow dark with tears and sorrow<br/>
I know He will never leave me<br/>
So with everything I am I will say...<br/>
<br/>
I want to be a God follower<br/>
I want to go wherever He leads<br/>
I want to be a God follower<br/>
I want to walk the trail He's marked for me<br/>
<br/>
And when I reach God's place I will look into His face<br/>
And then I'll look for you<br/>
Will I find you there?<br/>
Can you say with me...<br/>
I want to be a God follower<br/>
I want to be a God follower<br/>
I want to be a God follower<br/>
I want to be a God follower<br/>
TEXT
    ),
    array(
        'title' => 'Carry You To Jesus',
        'description' => 'Track 12',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
I will not pretend to feel the pain you're going through<br/>
I know I cannot comprehend the hurt you've known<br/>
And I used to think it mattered if I understood<br/>
But now I just don't know<br/>
<br/>
Well, I'll admit sometimes I still wish I knew what to say<br/>
And I keep looking for a way to fix it all<br/>
But we know we're at the mercy of God's higher ways<br/>
And our ways are so small<br/>
<br/>
But I will carry you to Jesus<br/>
He is everything you need<br/>
I will carry you to Jesus on my knees<br/>
<br/>
It's such a privilege for me to give this gift to you<br/>
All I'd ever hope you give me in return<br/>
Is to know that you'll be there to do the same for me<br/>
When the tables turn<br/>
<br/>
But I will carry you to Jesus<br/>
He is everything you need<br/>
I will carry you to Jesus on my knees<br/>
<br/>
And if you need to cry go on and I, I will cry along with you. yeah<br/>
I've given you what I have but still I know the best thing I can do<br/>
Is just pray for you<br/>
<br/>
But I will carry you to Jesus<br/>
He is everything you need<br/>
I will carry you to Jesus on my knees<br/>
<br/>
I'll carry you<br/>
I'll take you to Jesus on my knees<br/>
TEXT
    ),
    array(
        'title' => 'Savior',
        'description' => 'Track 13',
        'playlist' => '',
        'genre' => 'Contemporary',
        'artist' => 'Steven Curtis Chapman',
        'album' => 'Declaration',
        'lyrics' => <<<TEXT
Well, who is this angry man I see<br/>
In the mirror looking back at me?<br/>
It's a man who's tired, a man who's weak<br/>
And it's a man who needs a Savior<br/>
<br/>
And who is this fearful little child<br/>
Crying out for home, but lost in the wild?<br/>
With a lonely heart that's fading fast<br/>
It's a child who needs a Savior<br/>
<br/>
And what is this longing in my soul<br/>
That I get so scared and angry?<br/>
I need more than just a little help<br/>
I need someone who will save me<br/>
Come and save me<br/>
I need someone to save me<br/>
Who will save me?<br/>
Come and save me<br/>
<br/>
And who is this one nailed to a cross<br/>
Who would rather die than leave us lost?<br/>
He's come to rescue us, come to set us free<br/>
Hallelujah, hallelujah<br/>
It is Christ the Lord' our Savior<br/>
TEXT
    ),
    array(
        'title' => 'God Is Watching Over You',
        'description' => '',
        'playlist' => 'Featured, Elemental',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
He sees you down by the waterline<br/>
Knows what you're thinking all the time<br/>
He sees the rising of the waves<br/>
And when the tide starts rolling in<br/>
He lets you know it's gonna be okay<br/>
<br/>
He sees you dancing in the moonlight<br/>
His arms around you hold you tight<br/>
And if those clouds should start to break<br/>
He'll be standing out in the rain with you<br/>
And though it's hard to believe<br/>
He believes in you<br/>
<br/>
God is watching over you as always<br/>
You are loved whatever you go through<br/>
He's right beside you<br/>
God is watching over you as always<br/>
And if you think He'll ever leave you<br/>
You'd better think again<br/>
<br/>
Painted in the sky a rainbow to remind you<br/>
Nothing that it broken cannot be made new<br/>
He knows when you feel so far away<br/>
He's gonna keep the nightlight on<br/>
He's waiting there, there to recieve you<br/>
<br/>
God is watching over you as always<br/>
You are loved whatever you go through<br/>
He's right beside you<br/>
God is watching over you as always<br/>
You are loved wherever you go<br/>
<br/>
[CHORUS]<br/>
Through fire, through wind, and through rain<br/>
Yesterday, today, and tomorrow the same<br/>
Nothing here could take this love<br/>
Nothing you could do would break this love<br/>
Climb a tree, gonna reach so high<br/>
Swing low, sweet chariot<br/>
It's time to fly<br/>
<br/>
And if you think He'll ever leave you<br/>
You'd better think again<br/>
<br/>
God is watching over you as always<br/>
You are loved whatever you go through<br/>
He's right beside you<br/>
God is watching over you as always<br/>
And if you think He'll ever leave you<br/>
You'd better think again<br/>
<br/>
God is watching over you as always<br/>
You are loved whatever you go through<br/>
He's right beside you<br/>
God is watching over you as always<br/>
Wherever you go<br/>
He sees you down by the waterline<br/>
TEXT
    ),
    array(
        'title' => 'Strangely Normal',
        'description' => '',
        'playlist' => '',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
She was getting sick n' tired<br/>
Of being sick n' tired<br/>
She'd drink three cups of coffee<br/>
And get really wired<br/>
She'd twitch n' move and shake her head<br/>
She'd lie on the floor pretend she was dead<br/>
She was normal but at the same time<br/>
<br/>
[CHORUS]<br/>
Strange<br/>
Strangely normal<br/>
Strange<br/>
Strangely normal<br/>
There ain't nobody else she was born to be<br/>
<br/>
She'd drown herself in a<br/>
Pool of liquid make up<br/>
She wished she had a boyfriend<br/>
So she could break up<br/>
She'd take herself out to those ugly places<br/>
Make herself sick all those beautiful faces<br/>
She was normal but at the same time<br/>
<br/>
[CHORUS]<br/>
Strange<br/>
Strangely normal<br/>
Strange<br/>
Strangely normal<br/>
There ain't nobody else she was born to be<br/>
<br/>
Make for yourself no apologies<br/>
Keep your eyes on Jesus and let Him be<br/>
The author of our lives and<br/>
Looking back one day we'll say<br/>
By following Jesus we<br/>
Become who we're supposed to be<br/>
And that's all we want<br/>
You are the hands we are clay<br/>
Mold us and make us strange<br/>
<br/>
You are the hands we are the clay<br/>
Make us and mold us something special<br/>
Strangely normal<br/>
(You make us)<br/>
<br/>
You are the hands we are the clay<br/>
Make us and mold us something special<br/>
Strangely normal<br/>
(You make us)<br/>
There ain't nobody else we were born to be<br/>
<br/>
[Echo]<br/>
You are the hands we are the clay<br/>
Make us and mold us something special<br/>
Strangely normal<br/>
(You make us)<br/>
There ain't nobody else we were born to be<br/>
<br/>
[Choose Your Echo]<br/>
TEXT
    ),
    array(
        'title' => 'El Salvador (The Savior)',
        'description' => '',
        'playlist' => 'Featured, Collide',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
Wrestled with the things I saw, steppin' through the door<br/>
Knowin' things won't be the same when I get back on the plane<br/>
<br/>
I look into your eyes and I feel like I know you<br/>
So far removed, our lives but so close inside, let our worlds collide<br/>
<br/>
El Salvador, El Salvador, You'll never know what You have done<br/>
You'll never know what has begun, You left Your mark on me<br/>
You left Your mark on me<br/>
<br/>
Wrestled with the things I saw, steppin' through the door<br/>
These circumstances are beyond Your control<br/>
I see Your hands, they touch my soul<br/>
Oh, this memory I'll always hold<br/>
<br/>
El Salvador, El Salvador, You'll never know what You have done<br/>
You'll never know what has begun<br/>
<br/>
I know more now than I have ever, ever known before<br/>
I learned more in one day than I have learned all years before<br/>
Don't let my heart grow cold for this I've seen<br/>
And You have shown me beyond this space, this time<br/>
<br/>
For (all) this I've seen and you have shown<br/>
Beyond this space, beyond this time, we must let our worlds collide<br/>
<br/>
El Salvador, El Salvador, You'll never know what You have done<br/>
You'll never know what has begun<br/>
El Salvador (oh we are so close inside)<br/>
El Salvador (oh let our worlds collide)<br/>
You left Your mark on me, You left Your mark on me<br/>
El Salvador, El Salvador, You left Your mark on me, El Salvador [Repeat Uniquely]<br/>
TEXT
    ),
    array(
        'title' => 'Author Of Life',
        'description' => '',
        'playlist' => 'Featured',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
Things aren't exactly what I thought they would be<br/>
I won't pretend, disappointment's never free<br/>
The sky's on fire, feels like the sky's on fire<br/>
I may be young but I'm feeling old<br/>
Like somebody borrowed years<br/>
And I found out they got sold<br/>
But I still love You<br/>
Although my sky's on fire<br/>
<br/>
To the Author of life<br/>
Be the Author of my life<br/>
To the Author do you hear me sing?<br/>
Hear me sing<br/>
<br/>
Swallow my pride<br/>
Let go inside<br/>
Show me Your Ways<br/>
Refine me<br/>
And I'll still love You<br/>
Although my sky's on fire<br/>
<br/>
To the Author of life<br/>
Be the Author of my life<br/>
To the Author do you hear me sing?<br/>
To the Author do you hear me?<br/>
<br/>
[CHORUS]<br/>
I see You've been hanging in there<br/>
Looking back I've been running everywhere<br/>
I've done it my way for far too long<br/>
Like I promised You years before<br/>
I say, "All I have is yours"<br/>
All I have is Yours<br/>
<br/>
To the Author of life<br/>
Be the Author of my life<br/>
To the Author do you hear me sing?<br/>
To the Author of life<br/>
Be the Author of my life<br/>
To the Author do you hear me sing?<br/>
Hear me sing<br/>
<br/>
[REPEATING CHORUS]<br/>
Swallow my pride<br/>
Let go inside<br/>
Show me Your ways<br/>
Refine me<br/>
<br/>
Swallow my pride<br/>
Let go inside<br/>
Show me Your ways<br/>
Refine me<br/>
TEXT
    ),
    array(
        'title' => 'Tonight (Not Fading Away)',
        'description' => '',
        'playlist' => '',
        'genre' => 'Light Rock, Electronic',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
Tonight, talking to You<br/>
I thought to myself<br/>
About all those conversations<br/>
Tonight, somebody new<br/>
Is gonna take control<br/>
And that somebody is You<br/>
<br/>
I was only thinking of You<br/>
The Jesus I never knew<br/>
Thinking of You<br/>
And now You finally broke through<br/>
Tonight<br/>
<br/>
Tonight, it's not just emotion<br/>
Coming over me<br/>
I hear You calling<br/>
"Hey come follow Me<br/>
And stop messing around<br/>
It's time to lay it all down<br/>
<br/>
Out in the fields there's a cold wind blowing<br/>
But here in your heart<br/>
You must surrender!"<br/>
<br/>
Tonight<br/>
You are more than a mystery<br/>
There's No more fading away for me<br/>
No more fading away {Stop fading away}<br/>
I'm not fading away<br/>
I'm not fading away {I'm not fading away}<br/>
[Various Reiteration]
We're not fading away<br/>
<br/>
I was only thinking of You<br/>
The Jesus I never knew<br/>
And now you finally broke through {The Jesus I never knew}!<br/>
Tonight!<br/>
(Wanna play again?)<br/>
TEXT
    ),
    array(
        'title' => 'My Generation',
        'description' => 'Light Rock, Electronic',
        'playlist' => '',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
Feel the flames in the moonlight<br/>
Feel the warmth from the campsite<br/>
There is no reason to fear<br/>
No one's alone here<br/>
<br/>
Memories never stray too far<br/>
West coast summers, our first cars<br/>
We were kings, this was our kingdom<br/>
But like soldiers to war we were sent<br/>
So many things called us away<br/>
And I saw the tail lights fade<br/>
<br/>
Watch you walking away<br/>
It's driving me crazy<br/>
It's my generation<br/>
Watch you walking away<br/>
It's driving me crazy<br/>
It's my generation<br/>
It's my generation<br/>
<br/>
Feel the flames in the moonlight<br/>
Growing up, our spirits so high<br/>
We had the fire and we felt the same<br/>
How did things get so strange?<br/>
Fuel the fire, gotta fan the coals<br/>
What will become of our souls?<br/>
<br/>
Watch you walking away<br/>
It's driving me crazy<br/>
It's my generation<br/>
Watch you walking away<br/>
It's driving me crazy<br/>
It's my generation<br/>
Watch you walking away<br/>
It's driving me crazy<br/>
It's my generation<br/>
<br/>
Better to look a fool and still say this<br/>
Close your eyes to the world's infatuations<br/>
You know the truth<br/>
And I wish you were here tonight<br/>
Tonight<br/>
Tonight<br/>
<br/>
Watch you walking away<br/>
It's driving me crazy<br/>
It's my generation<br/>
It's mine<br/>
<br/>
Watch you walking away<br/>
It's not too late<br/>
It's driving me crazy<br/>
It's my generation<br/>
<br/>
Watch you walking away<br/>
It's not too late<br/>
It's driving me crazy<br/>
It's never too late<br/>
It's my generation<br/>
It's mine<br/>
<br/>
Done done walking away<br/>
It's not too late<br/>
It's driving me crazy<br/>
It's never too late<br/>
It's my generation<br/>
[Repeatedly Fade Watch You Walking Away]
TEXT
    ),
    array(
        'title' => 'Be Number One',
        'description' => '',
        'playlist' => '',
        'genre' => 'Light Rock, Electronic',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
I want You<br/>
To be a part of everything I do<br/>
I want You<br/>
To be number one<br/>
I want You<br/>
To be a part of everything I do<br/>
I want You<br/>
To be number one<br/>
<br/>
If any man would come after Me<br/>
Let him take up his cross<br/>
And follow Me daily<br/>
If any man would wanna save his life<br/>
He will lose it<br/>
If any man would lose his life for Me<br/>
He will save it<br/>
<br/>
I want You<br/>
To be a part of everything I do<br/>
I want You<br/>
To be number one<br/>
I want You<br/>
To be a part of everything I do<br/>
I want You<br/>
To be number one<br/>
<br/>
Tell me what good is it<br/>
If a man (If a man) gains the whole world<br/>
And yet he loses his soul<br/>
Tell me what good is it<br/>
If a man (If a man) gains the whole world<br/>
And yet he loses his soul<br/>
<br/>
I want You<br/>
To be a part of everything I do<br/>
I want You<br/>
To be number one<br/>
<br/>
Be number One<br/>
I want You<br/>
To be a part of everything I do<br/>
Be number One<br/>
I want You<br/>
To be number One<br/>
<br/>
Be number One<br/>
I want You<br/>
To be a part of everything I do<br/>
Be number One<br/>
I want you to be number One<br/>
Be Number One!<br/>
TEXT
    ),
    array(
        'title' => 'Fragile',
        'description' => '',
        'playlist' => 'Elemental',
        'genre' => 'Light Rock, Electronic',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
Life is fragile<br/>
Everybody breaks so easy<br/>
Life is fragile<br/>
No one is immune<br/>
<br/>
In the long run<br/>
Everyone must take their turn<br/>
With this lesson we don't wanna take<br/>
But all have to learn<br/>
<br/>
And I'll stay here with you<br/>
Knowing that Jesus is here<br/>
To carry us through<br/>
And all through the night<br/>
I'll stay by your side<br/>
Until the morning appears<br/>
And sun and moon collide<br/>
<br/>
Life is fragile<br/>
Everybody breaks so easy<br/>
Life is fragile<br/>
No one is immune<br/>
<br/>
Our time betrays us<br/>
And our minds they try to enslave us<br/>
But there remains, none the less<br/>
Perfect hope that will lead us to rest<br/>
Perfect rest<br/>
<br/>
And I'll stay here with you<br/>
Knowing that Jesus is here<br/>
To carry us through<br/>
And all through the night<br/>
I'll stay by your side<br/>
Until the morning appears<br/>
And sun and moon collide<br/>
He'll carry us through<br/>
<br/>
I don't know where to begin<br/>
I've been thinking about You since<br/>
This began<br/>
Everyday it's the same<br/>
Such bitter sweet emotions<br/>
Like tears in the ocean<br/>
Prayers of praise then those<br/>
Tears of rage<br/>
I'm calling out you You, Lord<br/>
Is this a testing of my faith<br/>
Still all I know is You're in control<br/>
<br/>
Life is fragile<br/>
Everybody breaks<br/>
And I'll stay here with you<br/>
Knowing that Jesus is here<br/>
To carry us through<br/>
And all through the night<br/>
I'll stay by your side<br/>
Until the morning appears<br/>
And sun and moon collide<br/>
<br/>
Life is fragile<br/>
Everybody breaks so easy<br/>
TEXT
    ),
    array(
        'title' => 'It\'s You',
        'description' => '',
        'playlist' => '',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
It's You that I've been looking for<br/>
In worn out faces<br/>
Behind closed doors<br/>
It's You<br/>
I've been looking for<br/>
<br/>
It's You that I've been trying to reach<br/>
I spent my money on beautiful things<br/>
But it's You<br/>
I've been looking for (You)<br/>
<br/>
Where You are<br/>
Where I've been<br/>
So very close and yet so far between<br/>
All you are<br/>
All I've seen<br/>
You're all I ever really wanted<br/>
If I knew it or not<br/>
I've been looking for<br/>
<br/>
You that I've been trying to find<br/>
Studied hard to gain knowledge of all kinds<br/>
But it's You<br/>
I've been looking for<br/>
<br/>
You, You've been there<br/>
Holding the signs<br/>
Me, I've been standing here<br/>
Waiting in frozen lines<br/>
It's true<br/>
We're all looking for You<br/>
<br/>
Where You are<br/>
Where I've been<br/>
So very close and yet so far between<br/>
All you are<br/>
All I've seen<br/>
You're all I ever really wanted<br/>
If I knew it or not<br/>
I've been looking for<br/>
<br/>
Thinking about the circles<br/>
And a series of half truths<br/>
Thinking about the paths taken<br/>
Trying to find You<br/>
Seeing through the lies<br/>
Recognizing the disguise<br/>
I'm gonna run for my life<br/>
<br/>
Where You are<br/>
Where I've been<br/>
So very close and yet so far between<br/>
All you are<br/>
All I've seen<br/>
You're all I ever really wanted<br/>
<br/>
God it's You<br/>
It's You!<br/>
It's You!<br/>
It's You!<br/>
If I knew it or not<br/>
I've been looking for<br/>
TEXT
    ),
    array(
        'title' => 'Together',
        'description' => '',
        'playlist' => '',
        'genre' => 'Light Rock',
        'artist' => 'Phil Joel',
        'album' => 'Watching Over You',
        'lyrics' => <<<TEXT
We searched for shells on the beach<br/>
We did it every year<br/>
We'd carry them back home<br/>
To make the beach feel near<br/>
If I could take home a tree<br/>
It would be the center piece<br/>
Nobody told me that I'd miss you like this<br/>
<br/>
Together on the wrong side of the world<br/>
Together, just a boy and a girl<br/>
Together on the wrong side of the world<br/>
Together<br/>
And you know we'll always be strong<br/>
Because together we belong<br/>
<br/>
This is no roll of the dice<br/>
There are no fools in this game<br/>
We followed the Son<br/>
And we'll do it again<br/>
<br/>
Together on the wrong side of the world<br/>
Together, just a boy and a girl<br/>
Together on the wrong side of the world<br/>
Together, just a boy and a girl<br/>
<br/>
I know You have lead us here<br/>
This part it could not be more clear<br/>
I know that someday we will understand<br/>
And Your plan unfolds<br/>
Still all we need to know<br/>
Is that our home is with You<br/>
<br/>
We searched for shells on the beach<br/>
We did it every year<br/>
We'd carry them back home<br/>
To make the beach feel (near)<br/>
<br/>
Together on the wrong side of the world<br/>
Together, just a boy and a girl<br/>
Together on the wrong side of the world<br/>
Together, just a boy and a girl<br/>
<br/>
Heaven is not so far away<br/>
We will be home someday<br/>
Heaven is not so far away<br/>
We will be home someday<br/>
Heaven is not so far away<br/>
We will be home someday<br/>
Heaven is not so far away<br/>
We will be home someday<br/>
Heaven is not so far away<br/>
We will be home someday<br/>
Heaven is not so far away<br/>
We will be home someday<br/>
Heaven is not so far away<br/>
We will be home someday!<br/>
TEXT
    ),
    array(
        'title' => 'This is the Church',
        'description' => '',
        'playlist' => 'Church',
        'genre' => 'Gospel',
        'artist' => 'The Steeles',
        'album' => '',
        'lyrics' => <<<TEXT
This is the church<br/>
I am a part<br/>
Its doors are open<br/>
Come as you are<br/>
We know no boundaries<br/>
There are no stars<br/>
If you are broken<br/>
Come see God's heart<br/>
If you want to know what you're worth<br/>
This is the church<br/>
<br/>
Let's set the record straight<br/>
It's time for us to face<br/>
The fact that for decades<br/>
We've ruined our name<br/>
Just look around us<br/>
It's easy to see<br/>
That we share the blame<br/>
It's on you and me<br/>
<br/>
So blinded by ourselves, we forgot<br/>
This is the church<br/>
I am a part<br/>
Its doors are open<br/>
Come as you are<br/>
We know no boundaries<br/>
There are no stars<br/>
If you are broken<br/>
Come see God's heart<br/>
If you want to know what you're worth<br/>
This is the church<br/>
<br/>
None of us are perfect<br/>
We're battered, bruised, and flawed<br/>
Each of us are hurting<br/>
But we have all been called<br/>
To carry the message<br/>
To this human race<br/>
Our message is love<br/>
Our anthem is grace<br/>
It's time we remembered who we are<br/>
<br/>
This is the church<br/>
I am a part<br/>
Its doors are open<br/>
Come as you are<br/>
We know no boundaries<br/>
There are no stars<br/>
If you are broken<br/>
Come see God's heart<br/>
<br/>
If you want to know what you're worth<br/>
If you want to know what you're worth!<br/>
This is the church!<br/>
I am a part<br/>
Its doors are open<br/>
Come as you are<br/>
We know no boundaries<br/>
There are no stars<br/>
If you are broken<br/>
Come see God's heart<br/>
<br/>
If you want to know what you're worth!<br/>
This is the end of your search!<br/>
This is the church!<br/>
This is the church!<br/>
This is the church!<br/>
This is the church!<br/>
This is the church!<br/>
TEXT
    ),
    array(
        'title' => 'Are You Washed In The Blood?',
        'description' => '',
        'playlist' => 'Church',
        'genre' => 'Hymn, Bluegrass',
        'artist' => 'Randy Travis',
        'album' => '',
        'lyrics' => <<<TEXT
Have you been to Jesus for the cleansing power?<br/>
Are you washed in the blood of the Lamb?<br/>
Are you fully trusting in His grace this hour?<br/>
Are you washed in the blood of the Lamb?<br/>
<br/>
Are you washed (are you washed) in the blood (in the blood)?<br/>
In the soul cleansing blood of the Lamb?<br/>
Are your garments spotless? Are they white as snow?<br/>
Are you washed in the blood of the Lamb?<br/>
<br/>
Are you walking daily by the Savior's side?<br/>
Are you washed in the blood of the Lamb?<br/>
Do you rest each moment in the crucified?<br/>
Are you washed in the blood of the Lamb?<br/>
<br/>
Are you washed (are you washed) in the blood (in the blood)?<br/>
In the soul cleansing blood of the Lamb?<br/>
Are your garments spotless? Are they white as snow?<br/>
Are you washed in the blood of the Lamb?<br/>
<br/>
Are you washed (are you washed) in the blood (in the blood)?<br/>
In the soul cleansing blood of the Lamb?<br/>
Are your garments spotless? Are they whites as snow?<br/>
Are you washed in the blood of the Lamb?<br/>
<br/>
Are your garments spotless? Are they white as snow?<br/>
Are you washed in the blood of the Lamb?<br/>
TEXT
    ),
    array(
        'title' => 'The Dilemma',
        'description' => 'No Song Description',
        'playlist' => 'Empty Playlist',
        'genre' => 'No Genre',
        'artist' => 'Willie Will',
        'album' => 'No Album',
        'lyrics' => <<<TEXT
[Hook]<br/>
Humanity can't begin to understand<br/>
It's the holiness of God against the wickedness of man<br/>
How can a just God justify sin<br/>
With forgiveness in his hand I'm a sinna'<br/>
It's the dilemma<br/>
Standing before God we're filthy<br/>
How can a just judge justify the guilty (it's the dilemma)<br/>
He can not excuse evil or he's just as<br/>
Evil as us something to consida'<br/>
It's the dilemma<br/>
<br/>
[Verse 1]<br/>
Sin has covered our hearts with blackness<br/>
Lawless practice with the wrong attractions<br/>
Wrongful passions that we all are trapped in<br/>
We're severed from the Head like John the Baptist<br/>
And now we're about to see God in action<br/>
Cause God wants justice, God knows we're dirty<br/>
We need mercy, God wants to show us mercy<br/>
Oh man, this is problematic<br/>
Never in human history could you essentially<br/>
Excuse a sin and remain to be just<br/>
Justice gets painfully crushed<br/>
May we see a judge who is viciously<br/>
Holy to the tenth degree<br/>
God is a name we can trust<br/>
And if our judge is to be perfect<br/>
He must perfectly uphold the law<br/>
With no deceit beneath the surface<br/>
Important to recall: If the Lord is at all<br/>
Righteous well then we gotta be judged, according to the law<br/>
If the judge is just then he gotta go punish the lawbreaker<br/>
Romans 3:10--no one is a God chaser<br/>
We're savage members of a decadent race, debt in our face<br/>
The bad within us is an evident case<br/>
The sacrilegious, we're avid sinners, let me explain<br/>
The judge can't forgive us until the debt has been paid<br/>
Now you see what our dilemma is about<br/>
Remember this is a dilemma for God to figure out<br/>
<br/>
[Hook]<br/>
Humanity can't begin to understand<br/>
It's the holiness of God against the wickedness of man<br/>
How can a just God justify sin<br/>
With forgiveness in his hand I'm a sinna'<br/>
It's the dilemma<br/>
Standing before God we're filthy<br/>
How can a just judge justify the guilty (it's the dilemma)<br/>
He can not excuse evil or he's just as<br/>
Evil as us something to consida'<br/>
It's the dilemma<br/>
<br/>
[Verse 2]<br/>
Okay, check here's one to remember<br/>
Roll with me cause I got something to give ya<br/>
Lets just say your son is the victim<br/>
He was murdered and raped and dumped in the river<br/>
You're piping mad, you jump in the whip to<br/>
Pick up the squad to become his avenger<br/>
You wanna see this dude crushed and dismembered<br/>
All you really wanna see is justice delivered<br/>
Dude is in jail and court comes in December<br/>
You can only hope that this judge is a winner<br/>
He says, "I'm a merciful judge<br/>
I never hold a personal grudge<br/>
You can go free because I forgive ya!"<br/>
And the judge then expunges a list of<br/>
Wicked sins committed from the offender<br/>
What would you think of the judge?<br/>
Is he a justice defender? Or is he just a pretender?<br/>
Now decipher if much love is how you delight in a just judge<br/>
God is just and He rightfully must judge<br/>
Every wrong motive and law broken<br/>
Every idle thought and idol; god, that we hold<br/>
In our hearts, hoping<br/>
And if all of this is true<br/>
How can the judge of sinners<br/>
Choose anyone to give forgiveness to?<br/>
And since he must exact justice<br/>
Isn't it impossible for Him to forgive us?<br/>
It's the dilemma<br/>
[Hook]<br/>
Humanity can't begin to understand<br/>
It's the holiness of God against the wickedness of man<br/>
How can a just God justify sin<br/>
With forgiveness in his hand I'm a sinna'<br/>
It's the dilemma<br/>
Standing before God we're filthy<br/>
How can a just judge justify the guilty (it's the dilemma)<br/>
He can not excuse evil or he's just as<br/>
Evil as us something to consida'<br/>
It's the dilemma<br/>
<br/>
[Outro]<br/>
Proverbs 17:15,<br/>
The problem:<br/>
Anyone who justifies the wicked is an abomination to God.<br/>
Now think about Proverbs for a moment.<br/>
Look what it's teaching us:<br/>
Anyone who justifies a wicked man is what?<br/>
AN ABOMINATION TO GOD!<br/>
But what have we been rejoicing in the last few minutes?<br/>
GOD JUSTIFIED US EVEN THOUGH WE WERE WICKED!<br/>
<br/>
Does anybody see a problem?<br/>
If God says that anyone who justifies the wicked<br/>
is an abomination before Him, then<br/>
how can God justify you being wicked<br/>
without becoming an abomination?<br/>
<br/>
And that is the greatest problem in all the scripture,<br/>
and that is what the gospel of Jesus Christ<br/>
is all about.<br/>
<br/>
The greatest dilemma in all the Bible is this:<br/>
if God is just, he canNOT forgive you!<br/>
TEXT
    ),
    array(
        'title' => 'Song Title',
        'description' => 'No Song Description',
        'playlist' => 'Empty Playlist',
        'genre' => 'No Genre',
        'artist' => 'No Artist',
        'album' => 'No Album',
        'lyrics' => 'No Lyrics<br/>'
       )
);

// Prepare the insert statement
$insertStmt = $db->prepare("INSERT INTO music (title, description, playlist, genre, artist, album, lyrics) VALUES (?, ?, ?, ?, ?, ?, ?)");

if (!$insertStmt) {
    die("Error preparing insert statement: " . $db->error);
}

// Prepare the update statement
$updateStmt = $db->prepare("UPDATE music SET description = ?, playlist = ?, genre = ?, artist = ?, album = ?, lyrics = ? WHERE id = ?");

if (!$updateStmt) {
    die("Error preparing update statement: " . $db->error);
}

// Retrieve the existing songs from the 'music' table
$sqlExistingSongs = "SELECT * FROM music";
$resultExistingSongs = $db->query($sqlExistingSongs);

if ($resultExistingSongs) {
    // Create an array to store the existing song titles
    $existingSongs = array();

    // Fetch existing songs and store them in the array
    while ($row = $resultExistingSongs->fetch_assoc()) {
        $existingSongs[$row['title']] = $row;
    }

    // Loop through each music item in the script
    foreach ($musicItems as $musicItem) {
        $title = $musicItem['title'];

        // Check if the music item already exists in the database
        if (isset($existingSongs[$title])) {
            $existingSong = $existingSongs[$title];

            // Compare the values of the existing song with the music item in the script
            $update = false; // Flag to determine if an update is needed

            if ($existingSong['description'] != $musicItem['description']) {
                $existingSong['description'] = $musicItem['description'];
                $update = true;
            }

            if ($existingSong['playlist'] != $musicItem['playlist']) {
                $existingSong['playlist'] = $musicItem['playlist'];
                $update = true;
            }

            if ($existingSong['genre'] != $musicItem['genre']) {
                $existingSong['genre'] = $musicItem['genre'];
                $update = true;
            }

            if ($existingSong['artist'] != $musicItem['artist']) {
                $existingSong['artist'] = $musicItem['artist'];
                $update = true;
            }

            if ($existingSong['album'] != $musicItem['album']) {
                $existingSong['album'] = $musicItem['album'];
                $update = true;
            }

            if ($existingSong['lyrics'] != $musicItem['lyrics']) {
                $existingSong['lyrics'] = $musicItem['lyrics'];
                $update = true;
            }

            // Update the song if any changes are made
            if ($update) {
                $id = $existingSong['id'];
                $description = $musicItem['description'];
                $playlist = $musicItem['playlist'];
                $genre = $musicItem['genre'];
                $artist = $musicItem['artist'];
                $album = $musicItem['album'];
                $lyrics = $musicItem['lyrics'];

                $updateStmt->bind_param("ssssssi", $description, $playlist, $genre, $artist, $album, $lyrics, $id);

                if ($updateStmt->execute()) {
                    echo "Music item updated successfully: " . $title . "<br>";
                } else {
                    echo "Error updating music item: " . $updateStmt->error;
                }
            }

            // Remove the song from the existing songs array to track any remaining songs to delete
            unset($existingSongs[$title]);
        } else {
            // Music item does not exist in the database, insert it
            $description = $musicItem['description'];
            $playlist = $musicItem['playlist'];
            $genre = $musicItem['genre'];
            $artist = $musicItem['artist'];
            $album = $musicItem['album'];
            $lyrics = $musicItem['lyrics'];

            $insertStmt->bind_param("sssssss", $title, $description, $playlist, $genre, $artist, $album, $lyrics);

            if ($insertStmt->execute()) {
                echo "Music item added successfully: " . $title . "<br>";
            } else {
                echo "Error inserting music item: " . $insertStmt->error;
            }
        }
    }

    // Delete any remaining songs from the database (not present in the script)
    foreach ($existingSongs as $song) {
        $id = $song['id'];

        $sqlDelete = "DELETE FROM music WHERE id = $id";

        if ($db->query($sqlDelete) !== TRUE) {
            echo "Error deleting music item: " . $db->error;
        } else {
            echo "Music item deleted from the database: " . $song['title'] . "<br>";
        }
    }
} else {
    echo "Error retrieving existing songs: " . $db->error;
}

// Close the prepared statements
$insertStmt->close();
$updateStmt->close();

// Close the database connection
$db->close();
?>