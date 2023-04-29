const CACHE_NAME = "accessible_offline_429023"
const STATIC_ASSETS = [
'bible/bible.html',
'bible/ot.html',
'bible/genesis.html',
'bible/exodus.html',
'bible/leviticus.html',
'bible/numbers.html',
'bible/deuteronomy.html',
'bible/joshua.html',
'bible/judges.html',
'bible/ruth.html',
'bible/samuel.html',
'bible/samuel2.html',
'bible/kings.html',
'bible/kings2.html',
'bible/chronicles.html',
'bible/chronicles2.html',
'bible/ezra.html',
'bible/nehemiah.html',
'bible/esther.html',
'bible/job.html',
'bible/psalms.html',
'bible/proverbs.html',
'bible/ecclesiastes.html',
'bible/solomon.html',
'bible/isaiah.html',
'bible/jeremiah.html',
'bible/lamentations.html',
'bible/ezekiel.html',
'bible/daniel.html',
'bible/hosea.html',
'bible/joel.html',
'bible/amos.html',
'bible/obadiah.html',
'bible/jonah.html',
'bible/micah.html',
'bible/nahum.html',
'bible/habakkuk.html',
'bible/zephaniah.html',
'bible/haggai.html',
'bible/zechariah.html',
'bible/malachi.html',
'bible/nt.html',
'bible/matthew.html',
'bible/mark.html',
'bible/luke.html',
'bible/john.html',
'bible/acts.html',
'bible/romans.html',
'bible/corinthians.html',
'bible/corinthians2.html',
'bible/galatians.html',
'bible/ephesians.html',
'bible/philippians.html',
'bible/colossians.html',
'bible/thessalonians.html',
'bible/thessalonians2.html',
'bible/timothy.html',
'bible/timothy2.html',
'bible/titus.html',
'bible/philemon.html',
'bible/hebrews.html',
'bible/james.html',
'bible/peter.html',
'bible/peter2.html',
'bible/john1.html',
'bible/john2.html',
'bible/john3.html',
'bible/jude.html',
'bible/revelation.html',
'add/a-html.php',
'add/head.php',
'add/a-body.php',
'container.php',
'add/navigation.php',
'add/c-div.php',
'add/c-body_html.php',
'index.php',
'exposition/index.php',
'music/index.php',
'music/book.php',
'altar/index.php',
'add/style.css',
'add/manifest.json',
'favicon.png',
'touch-icon-ipad-retina.png',
'touch-icon-ipad.png',
'touch-icon-iphone-retina.png',
'touch-icon-iphone.png',
'sw.js',
'add/offline.html'
]
async function preCache() {
	const cache = await caches.open(CACHE_NAME)
	return cache.addAll(STATIC_ASSETS)
}
self.addEventListener('install', event => {
	console.log("[SW] installed");
	self.skipWaiting()
	event.waitUntil(preCache())
})
async function cleanupCache() {
	const keys = await caches.keys()
	const keysToDelete keys.map(key => {
		if (key !== Cache_NAME) {
			return.caches.delete(key)
		}
	})
	return Promise.all(keysToDelete)
}
self.addEventListener('activate', event => {
	console.log("[SW] activated");
	event.waitUntil(cleanupCache())
})
async function fetchAssets(event) {
	try {
		const response = await fetch(event.request)
		return response
	} catch (err) {
		const cache = await caches.open(CACHE_NAME)
		return cache.match(event.request)
	}
}
self.addEventListener('fetch', event => {
	console.log("[SW] fetched");
	event.respondWith(fetchAssets(event))
})