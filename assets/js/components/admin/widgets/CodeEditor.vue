<template>
	<div>
		<textarea ref="textarea" class="form__item" cols="30" rows="10" v-model="form"></textarea>
		<markdown :class="{ 'isFullscreen' : markclass  }" ref="mark" :value="data"></markdown>
	</div>
</template>


<script>

	import Markdown from "./Markdown"

	export default {
		name: "CodeEditor",
		components: {
			Markdown
		},
		props: {
			data: {
				required: false,
				type: String
			}
		},
		data() {
			return {
				form: this.data || '',
				codemirror: null,
				markclass: false
			}
		},
		computed: {
            document() {
                return this.codemirror.getDoc()
            }
		},
		mounted() {
			let CodeMirror = require('codemirror')
			require('codemirror/addon/hint/html-hint.js')
			require('codemirror/addon/display/fullscreen.js') 
			this.codemirror = CodeMirror.fromTextArea(this.$refs.textarea, {
				indentUnit: 2,
				indentWithTabs: false,
				smartIndent: true,
				lineWrapping: true,
				lineNumbers: true,
				scrollbarStyle: null,
				mode: "htmlmixed",
				theme: 'material-palenight',
				extraKeys: {
					"Shift+Space": (codemirror) => { 
						console.log('key')
						codemirror.execCommand('autocomplete')
					},
					Tab: (codemirror) => codemirror.execCommand('indentMore'),
					'Shift-Tab': (codemirror) => codemirror.execCommand('indentLess'),
					"F11": (codemirror) => {
					  codemirror.setOption("fullScreen", !codemirror.getOption("fullScreen"));
					  this.markclass = !this.markclass
					},
					"Esc": (codemirror) => {
					  if (codemirror.getOption("fullScreen")) codemirror.setOption("fullScreen", false);
					  this.markclass = false
					}
			        
			    }
			})

			this.document.setValue(this.form)

			this.document.on('change', (document) => {
				this.$emit('input', document.getValue())
			})
		}
	}

</script>
