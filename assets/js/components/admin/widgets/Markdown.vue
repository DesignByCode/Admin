<template>
	<div class="panel panel--default">
		<div class="panel__header background--primary-light"><h3>Markdown View</h3></div>
		<div class="panel__body" v-html="markdown"></div>
	</div>
</template>

<script>
	
	import hljs from 'highlight.js'

	let MarkdownIt = require('markdown-it')({
			html: true,	
			linkify: true,
			typographer: true,
			highlight( str, lang) {
				let esc = MarkdownIt.utils.escapeHtml
				if (lang && hljs.getLanguage(lang)) {
					return `<pre class="hljs language-${esc(lang.toLowerCase())}"><code>${hljs.highlightAuto(esc(str)).value}</code></pre>`
				}
				return `<pre class="hljs"><code>${esc(str)}</code></pre>`
			}
		})

	export default {
		name: "Markdown",
		props: {
			value: {
				required: true
				// type: String,
			}
		},
		components: {
			MarkdownIt
		},
		computed: {
			markdown() {
				return MarkdownIt.render(String(this.value || ''))
			}
		}
	}

</script>
